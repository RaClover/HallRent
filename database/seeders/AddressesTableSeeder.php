<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Hall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $halls = Hall::all();

        foreach ($halls as $hall) {
            Address::factory()->create([
                'hall_id' => $hall->id,
            ]);
        }
    }
}
