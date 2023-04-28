<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HallsController extends Controller
{
    public function index($city)
    {
        $halls = Hall::whereHas('address', function ($query) use ($city) {
            $query->where('city', $city);
        })->get();
        return Inertia::render('User/Halls' , [
            'halls' => $halls ,
            'city' => $city
        ]);
    }
}
