<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Birthday', 'slug' => 'birthday'],
            ['name' => 'Wedding', 'slug' => 'wedding'],
            ['name' => 'New Year', 'slug' => 'new-year'],
            ['name' => 'Corporate', 'slug' => 'corporate'],
            ['name' => 'Graduation', 'slug' => 'graduation'],
            ['name' => 'Family Reunion', 'slug' => 'family-reunion'],
            ['name' => 'Special Event', 'slug' => 'special-event'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }




}
