<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public function create()
    {
        $category = Category::all();
        return view('course.create', compact(['category']))->extends('layout.app')->section('content');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required',
                'status' => 'nullable',
                
                'category_id' => 'required|array|min:1',
                'thumbnail' => $request->hasFile('thumbnail') ? 'image' : '',
            ],
            [
                'category_id.min' => 'Minimal 1 kategori',
                'category_id.required' => 'Harap memilih kategori',
                '*.required' => 'Harap mengisi kolom ini',
            ]
        );
       
        $course = new Course;
        DB::beginTransaction();
        try {       
            $course->title = $request->title;
            $course->status = $request->status;
            $course->description = $request->description;
            $course->save();
            foreach ($request->category_id as $key => $item) {
                $dataCategory = Category::find($item);
                if (!$dataCategory) {
                    $category = Category::create(['nama' => $item]);
                    $item = $category->id;
                }
                DB::table('category_course')->insert(
                    [
                        'course_id' => $course->id,
                        'category_id' => $item,
                    ]
                );
            }
            $slug = $course->slug;
            if ($request->hasFile('thumbnail')) {
                    $file = $request->file('thumbnail');
                    $fileName = $file->hashName();
                    $file->storeAs('uploads', $fileName);
                    $extension = $request->file('thumbnail')->getClientOriginalExtension();
                    $fullFileName = $fileName . '.' . $extension;
                    // Simpan path file ke dalam database untuk ukuran besar (misalnya)
                    $fileName = $filePath . "{$slug}"; // Simpan path gambar besar ke dalam database
                } else {
                    $fileName = "thumbnail/default"; // Default jika tidak ada file yang diupload
                }
                $course->thumbnail = $fileName;
        
            $course->save();
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            return response()->json(['error' => 'Gagal menyimpan course: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
        session()->flash('message', 'Data berhasil ditambah');
        return redirect()->to('/course');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
