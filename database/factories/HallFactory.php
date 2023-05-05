<?php

namespace Database\Factories;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->sentence(2);
        $slug = Str::slug($name);
        return [
            'user_id' => User::factory(),
            'type_id' => Type::factory(),
            'name' => $name,
            'slug' => $slug,
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
