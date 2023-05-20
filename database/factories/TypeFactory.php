<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class TypeFactory extends Factory
{
    protected $model = Type::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->unique()->randomElement([
            'Children\'s birthday',
            'Birthday',
            'Wedding',
            'New Year',
            'Corporate',
            'Graduation',
            'Family Reunion',
            'Special Event',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
