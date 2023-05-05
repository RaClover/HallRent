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
        $halls = HallResource::collection(
            Hall::query()
                ->join('addresses', 'halls.id', '=', 'addresses.hall_id')
                ->withTypes($request->type ?? '')
                ->withMinPrice($request->min_price ?? '')
                ->withMaxPrice($request->max_price ?? '')
                ->withSearch($request->search ?? '')
                ->orderBy($request->sortBy ?? 'name')
                ->with('type')
                ->where('addresses.city', $city)
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
            'category' => $request->category ?? '',
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
