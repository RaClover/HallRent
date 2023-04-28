<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use function Sodium\add;

class HomeController extends Controller
{
    public function home()
    {
        $address = Address::select('city', DB::raw('COUNT(halls.id) AS hallCount'))->leftJoin('halls', 'addresses.hall_id', '=', 'halls.id')->groupBy('city')->paginate(4);



        return inertia('Welcome' , [
            'address' => $address
        ]);
    }


    public function aboutUs()
    {
     return Inertia::render('User/AboutUs');
    }



}
