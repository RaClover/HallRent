<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Hall;
use App\Models\User;
use Database\Factories\HallFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
//        $this->call(TypesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(AddressesTableSeeder::class);
//        $this->call(HallsTableSeeder::class);
//        $this->call(HallImagesTableSeeder::class);




//        to run the HallsTableSeeder 40 more times
//
        for ($i = 0; $i < 40; $i++) {
            $this->call(HallsTableSeeder::class);
        }


    }
}
