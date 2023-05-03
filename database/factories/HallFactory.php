<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hall>
 */
class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'email' => fake()->email,
            'description' => fake()->paragraph,
            'phone' =>  fake()->phoneNumber,
            'price' => fake()->randomFloat(2, 50, 500),
            'size' => fake()->numberBetween(50, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
