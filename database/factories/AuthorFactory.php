<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{
    // fake authors made with Faker
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->randomElement(['Kagawad', 'Secretary', 'BHW', 'Tanod']),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
