<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = ['slug', 'title', 'thumbnail', 'description', 'status'];

    public function lessons(){
        return $this->hasMany(lessons::class)->orderBy('order');
    }
}
