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
