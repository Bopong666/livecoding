<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;
    protected $fillable  = ['course_id', 'title', 'description', 'order'];

    public function course(){
        return $this->belongsTo(course::class)->orderBy('order');
    }
}
