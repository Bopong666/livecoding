<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lessons;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::all()->each(function ($course){
            $jumlahLesson = 10;
            for($i = 1; $i < $jumlahLesson; $i++ ){
                Lessons::factory()->create([
                    'course_id' => $course->id,
                    'order' => 1,
                    'title' => "Lesson {$i}",
                ]);
            }
        });
    }
}
