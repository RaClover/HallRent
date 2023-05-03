<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        $address = Address::select('city', DB::raw('COUNT(halls.id) AS hallCount'))
            ->leftJoin('halls', 'addresses.hall_id', '=', 'halls.id')
            ->groupBy('city')
            ->paginate(4);
        $cities = Address::select('city')->groupBy('city')->get()->pluck('city');
        return Inertia::render('Welcome', [
            'address' => $address ,
            'cities' => $cities
        ]);
    }



    public function aboutUs()
    {
     return Inertia::render('User/AboutUs');
    }



}
