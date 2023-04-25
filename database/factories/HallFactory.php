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
            'phone' =>  fake()->phoneNumber,
//            'timeWork' => json_encode([
//                fake()->dayOfMonth,
//                fake()->dayOfMonth,
//                fake()->dayOfMonth
//            ]),
//            'marketLogo' => fake()->name,
////            'brandType' => json_encode([
////                fake()->name,
////                fake()->name,
////                fake()->name
////            ]),
//            'ratingNum' => fake()->numberBetween(1,5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
