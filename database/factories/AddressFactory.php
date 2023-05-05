<?php

namespace Database\Factories;

use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => 'Saint Petersburg',
            'street' =>fake()->streetAddress,
            'hall_id' => Hall::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
