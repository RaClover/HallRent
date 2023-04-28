<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $halls = Hall::factory(rand(1, 7))->create([
                'user_id' => $user->id
            ]);

            foreach ($halls as $hall) {
                $address = Address::factory()->create();
                $hall->address_id = $address->id;
                $hall->save();
            }
        }
    }
}
