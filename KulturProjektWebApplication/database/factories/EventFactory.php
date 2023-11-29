<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $id = 1;
        return [
            'name' => 'Test Event - ' . $id++,
            'start' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'end' => fake()->dateTimeBetween('+1 week', '+2 week'),
            'shortDescription' => fake()->sentences(3, true),
            'longDescription' =>fake()->paragraphs(23, true),
            'thumbnail' => 'TN_placeholder.png'
        ];
    }
}
