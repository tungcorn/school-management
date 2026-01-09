<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_id' => School::factory(),
            'full_name' => fake()->name,
            'student_id' => fake()->unique()->numerify('######'),
            'email' => fake()->unique()->email,
            'phone' => fake()->phoneNumber,
        ];
    }
}
