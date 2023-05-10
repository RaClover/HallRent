<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\HallImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HallImage>
 */
class HallImageFactory extends Factory
{

    protected $model = HallImage::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hallIds = Hall::pluck('id')->toArray();
        $hallId = $this->faker->randomElement($hallIds);
        $imagePath = UploadedFile::fake()->image('hall_image.jpg');
        $filename = Str::random(40) . '.' . $imagePath->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('hall_images', $imagePath, $filename);

        return [
            'hall_id' => $hallId,
            'img' => 'hall_images/' . $filename,
        ];
    }
}
