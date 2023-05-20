<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{


    public function contact()
    {
        return Inertia::render('User/Booking/Contact');
    }


}
