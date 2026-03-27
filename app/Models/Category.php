<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = ['slug', 'name'];
 protected static function boot()
    {
        parent::boot();
    static::saving(function ($category) {
            // Jika ID-nya null, berarti sedang menambah data baru
            if ($category->id == null) {
                $menemukan = self::where('slug', 'LIKE',  '%'.Str::slug($category->name). '%')->count();
                $urutan = 1 + $menemukan;
                if ($urutan > 1) {
                    $category->slug = Str::slug($category->name) . '-' . $urutan;
                } else {
                    $category->slug = Str::slug($category->name);
                }
            } else { // Jika ID-nya ada, berarti sedang mengupdate data
                // Cek apakah name diubah
                $categoryLama = self::find($category->id);

                if ($categoryLama->name != $category->name) {
                    $menemukan = self::where('slug', Str::slug($category->name))->count();
                    $urutan = 1 + $menemukan;

                    if ($urutan > 1) {
                        $category->slug = Str::slug($category->name) . '-' . $urutan;
                    } else {
                        $category->slug = Str::slug($category->name);
                    }
                }
            }
        });
    }
}
