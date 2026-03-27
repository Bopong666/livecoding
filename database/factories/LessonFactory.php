<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'course_id' => Course::factory(),
             'title' => 'Lesson ' . fake()->numberBetween(1, 50) . ' - ' . fake()->sentence(2),
             'order' => 1,
            'description' => fake()->paragraph(),
        ];
    }
}
