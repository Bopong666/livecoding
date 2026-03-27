<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $judul = fake()->unique()->sentence(3);
        return [
            'slug' => Str::slug($judul),
            'title' => $judul,
            'description' => fake()->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
