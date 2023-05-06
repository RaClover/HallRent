<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Hall;
use App\Models\Type;
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
        $types = Type::whereIn('slug', ['childrens-birthday', 'birthday', 'wedding', 'new-year', 'corporate', 'graduation', 'family-reunion', 'special-event'])->get();
        $users = User::where('role', 'partner')->get();
        $addresses = Address::all();

        foreach ($types as $type) {
            foreach ($users as $user) {
                $halls = Hall::factory()->count(3)->create([
                    'user_id' => $user->id,
                    'type_id' => $type->id,
                    'address_id' => $addresses->random()->id,
                ]);
            }
        }
    }
}
