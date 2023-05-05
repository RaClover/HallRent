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
     */ public function run()
{
    $users = User::all();
    $types = Type::all();

    foreach ($users as $user) {
        if ($user->id) {
            $count = rand(1, 5);
            Hall::factory()->count($count)->create([
                'user_id' => $user->id,
                'type_id' => $types->isNotEmpty() ? $types->random()->id : Type::factory()->create()->id,
            ]);
        }
    }
}
}
