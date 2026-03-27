<?php

namespace Database\Seeders;

use App\Models\Course;
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
                Lesson::factory()->create([
                    'course_id' => $course->id,
                    'order' => 1,
                    'judul' => "Lesson {$i}",
                ]);
            }
        });
    }
}
