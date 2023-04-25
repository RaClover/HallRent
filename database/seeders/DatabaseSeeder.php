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
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         User::factory(2)->has(
             Hall::factory()->has(
                 Address::factory()->count(1)
             )->count(1)
         )->create();


    }
}
