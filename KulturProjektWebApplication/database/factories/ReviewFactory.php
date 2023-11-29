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
            'user_id' => fake()->numberBetween(1,11),
            'event_id' => fake()->randomNumber(1,10),
            'review' =>fake()->sentences(3,true),
            'rating' =>fake()->numberBetween(1,5)
        ];
    }
}
