<?php

namespace Database\Seeders;

use App\Models\Hall;
use App\Models\HallImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hall::chunk(100, function ($halls) {
            $hallImages = [];

            foreach ($halls as $hall) {
                $images = HallImage::factory()->count(1)->make([
                    'hall_id' => $hall->id,
                ])->toArray();

                $hallImages = array_merge($hallImages, $images);
            }

            HallImage::insert($hallImages);
        });
    }
}
