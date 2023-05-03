<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Hall;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HallsController extends Controller
{
    public function index($city)
    {

        $address = Address::where('city', $city)->first();

        if (!$address) {
            return redirect()->back()->with('message' , 'there is no halls in ' . $city . ' city yet');
        }

        $halls = Hall::join('addresses', 'halls.id', '=', 'addresses.hall_id')
            ->where('addresses.city', $city)
            ->paginate(18);
        $links = $halls->links()->toHtml();
        return Inertia::render('User/Halls' , [
            'halls' => $halls ,
            'city' => $city ,
            'links' => $links,
        ]);
    }


    public function hallDetail()
    {
        return Inertia::render('User/HallDetail');
    }


}
