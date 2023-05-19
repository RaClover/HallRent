<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Hall;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class HallFactory extends Factory
{

    protected $model = Hall::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence(3);
        $slug = Str::slug($name);
        $type = Type::inRandomOrder()->first(); // get a random Type record
        return [
            'user_id' => User::factory()->create()->id,
            'type_id' => $type->id,
            'address_id' => Address::factory()->create()->id,
            'name' => $name,
            'slug' => $slug,
            'description' => fake()->paragraph,
            'price' => fake()->randomFloat(2, 50, 500),
            'size' => fake()->numberBetween(50, 500),
            'capacity' => fake()->numberBetween(1, 100),
            'floor_number' => fake()->numberBetween(1, 10),
            'parking_available' => fake()->randomElement(['free parking', 'paid parking', 'no parking']),
            'pets_policy' => fake()->randomElement(['No pets', 'Small pets', 'All pets']),
            'furniture' => fake()->boolean,
            'toilets' => fake()->numberBetween(0, 3),
            'kitchens' => fake()->numberBetween(0, 2),
            'smoking_policy' => fake()->sentence,
            'alcohol_policy' => fake()->sentence,
            'noise_restrictions' => fake()->sentence,
            'cleanup_requirements' => fake()->sentence,
            'security_deposit' => fake()->randomFloat(2, 100, 1000),
            'cancellation_policy' => fake()->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
