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
                    ->with('type')
                    ->orderBy($request->sortBy ?? 'name')
                    ->paginate(8)
                    ->withQueryString()
            );


            $types = TypeResource::collection(Type::withCount('halls')->get());
        $links = $halls->links()->toHtml();
        return Inertia::render('User/Halls' , [
            'halls' => $halls ,
            'city' => $city ,
            'links' => $links,
            'types' => $types,
            'type' => $request->type ?? '',
            'min_price' => $request->min_price ?? '',
            'max_price' => $request->max_price ?? '',
            'sortBy' => $request->sortBy ?? '',
            'search' => $request->search
        ]);
    }










    public function hallDetail()
    {
        return Inertia::render('User/HallDetail');
    }


}
