<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Hall;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
//
//        $types = Type::whereIn('slug', ['children-birthday', 'birthday', 'wedding', 'new-year', 'corporate', 'graduation', 'family-reunion', 'special-event'])->get();
//        $users = User::where('role', 'partner')->get();
//        $addresses = Address::all();
//
//        foreach ($types as $type) {
//            foreach ($users as $user) {
//                $halls = Hall::factory()->count(1)->create([
//                    'user_id' => $user->id,
//                    'type_id' => $type->id,
//                    'address_id' => $addresses->random()->id,
//                ]);
//            }
//        }




        /*
         the next is just to seed more halls and the
        type_id will be from the types that are already in the Type table
        user_id will be from the users that are already in the User table
        address_id will be from the users that are already in the Address table

          */


        $hallsData = [];

        $types = Type::whereIn('slug', ['childrens-birthday', 'birthday', 'wedding', 'new-year', 'corporate', 'graduation', 'family-reunion', 'special-event'])->get();
        $users = User::where('role', 'partner')->get();
        $addresses = Address::all();

        foreach ($types as $type) {
            foreach ($users as $user) {
                $hallsData[] = [
                    'name' => 'Hall ' . $type->slug . ' for ' . $user->name,
                    'slug' => Str::slug('Hall ' . $type->slug . ' for ' . $user->name),
                    'description' => 'This is a ' . $type->name . ' hall owned by ' . $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'price' => rand(100, 1000),
                    'size' => rand(50, 500),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        foreach ($hallsData as $key => $hallData) {
            $hallData['type_id'] = $types[$key % count($types)]->id;
            $hallData['user_id'] = $users[$key % count($users)]->id;
            $hallData['address_id'] = $addresses[$key % count($addresses)]->id;
            Hall::create($hallData);
        }





    }
}
