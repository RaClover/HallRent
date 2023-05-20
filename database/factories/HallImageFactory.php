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
        $image = UploadedFile::fake()->image('hall-image.jpg');
        $path = Storage::putFile('public/hall-images', $image);
        return [
            'img' => Storage::url($path),
        ];
    }
}
