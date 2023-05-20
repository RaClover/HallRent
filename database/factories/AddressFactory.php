<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{

    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => fake()->city,
            'street' =>fake()->streetAddress,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
