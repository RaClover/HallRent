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
        $halls = Hall::all();
        foreach ($halls as $hall) {
            HallImage::factory()->count(1)->create([
                'hall_id' => $hall->id,
                'img' => 'https://picsum.photos/800/600?random=' . rand(1, 1000),
            ]);
        }
    }
}
