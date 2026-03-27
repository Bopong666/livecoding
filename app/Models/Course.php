<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = ['slug', 'title', 'thumbnail', 'description', 'status'];

    public function lessons(){
        return $this->hasMany(lessons::class)->orderBy('order');
    }

     protected static function boot()
    {
        parent::boot();
    static::saving(function ($course) {
            // Jika ID-nya null, berarti sedang menambah data baru
            if ($course->id == null) {
                $menemukan = self::where('slug', 'LIKE',  '%'.Str::slug($course->title). '%')->count();
                $urutan = 1 + $menemukan;
                if ($urutan > 1) {
                    $course->slug = Str::slug($course->title) . '-' . $urutan;
                } else {
                    $course->slug = Str::slug($course->title);
                }
            } else { // Jika ID-nya ada, berarti sedang mengupdate data
                // Cek apakah name diubah
                $courseLama = self::find($course->id);

                if ($courseLama->title != $course->title) {
                    $menemukan = self::where('slug', Str::slug($course->title))->count();
                    $urutan = 1 + $menemukan;

                    if ($urutan > 1) {
                        $course->slug = Str::slug($course->title) . '-' . $urutan;
                    } else {
                        $course->slug = Str::slug($course->title);
                    }
                }
            }
        });
    }
}
