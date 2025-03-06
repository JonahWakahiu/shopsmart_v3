<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(rand(4, 7), true),
            'rating' => fake()->numberBetween(1, 5),
            'message' => fake()->sentences(rand(4, 7), true),
            'anonymous' => fake()->boolean(30),
        ];
    }
}
