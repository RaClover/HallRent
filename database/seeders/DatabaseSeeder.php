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
    public function run(): void
    {
        User::factory(1)->has(
            Hall::factory()->has(
                Address::factory()->count(1)
            )->count(2)
        )->create();
    }
}
