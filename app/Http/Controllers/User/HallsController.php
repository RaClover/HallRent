<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Hall;
use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\HallResource;
use App\Http\Resources\TypeResource;

class HallsController extends Controller
{
    public function index(Request $request , $city)
    {
        $address = Address::where('city', $city)->first();

            $halls = HallResource::collection(
                $address->halls()
                    ->withTypes($request->type ?? '')
                    ->withMinPrice($request->min_price ?? '')
                    ->withMaxPrice($request->max_price ?? '')
                    ->withSearch($request->search ?? '')
                    ->with('type' , 'user')
                    ->withSortBy($request->sortBy ?? '')
                    ->paginate(8)
                    ->withQueryString()
            );

            $types = TypeResource::collection(Type::withCount('halls')->get());

        return Inertia::render('User/Halls' , [
            'halls' => $halls ,
            'city' => $city ,
            'types' => $types,
            'type' => $request->type ?? '',
            'min_price' => $request->min_price ?? '',
            'max_price' => $request->max_price ?? '',
            'sortBy' => $request->sortBy ?? '',
            'search' => $request->search
        ]);
    }










    public function hallDetail( $city  , Hall $hall)
    {

        $user = $hall->user;
        return Inertia::render('User/HallDetail' , [
            'hall' => $hall ,
            'user' => $user
        ]);
    }


    public function userPortfolio()
    {

        return Inertia::render('User/UserPortfolio');
    }


}
