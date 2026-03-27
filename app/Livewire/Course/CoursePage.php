<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class CoursePage extends Component
{
 use WithPagination;
    protected $paginationTheme = 'bootstrap';

     public $idHapus;
    public $search;
     public function render()
    {
        // Mengambil data Course dengan pencarian
        $query = Course::where(function ($query) {
            $query->orWhere('title', 'LIKE', '%' . $this->search . '%');
        })->orderBy('id', 'DESC');

        // Melakukan paginasi
        $paginatedItems = $query->paginate(10);

        // Mengubah tanggal format untuk setiap item di koleksi
        $paginatedItems->getCollection()->transform(function ($item) {
            $item->tanggal_dibuat = Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y');
            return $item;
        });

        return view('livewire.course.course-page', [
            'list' => $paginatedItems
        ])->extends('layout.app')->section('content');
    }


    public function hapus($id)
    {
        $data = Course::find($id); 
        $data->delete();
        session()->flash('message', 'Data berhasil dihapus');
        $this->dispatch('hapus');
    }
}
