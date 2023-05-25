<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Hall;
use App\Models\HallImage;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use GuzzleHttp\Client;


class HomeController extends Controller
{
    public function home()
    {
        $address = Address::has('halls')->withCount('halls')->paginate(4, ['city', 'halls_count']);
        $cities = DB::table('addresses')->distinct()->pluck('city');

        // Retrieve all hall images
        $hallImages = HallImage::pluck('img')->toArray();

        // Fetch city images for each city
        $cityImages = [];
        foreach ($cities as $city) {
            $imageUrls = $this->fetchCityImages($city);
            $cityImages[$city] = $imageUrls;
        }


        return Inertia::render('Welcome', [
            'address' => $address ,
            'cities' => $cities,
            'hallImages' => $hallImages,
            'cityImages' => $cityImages,
        ]);
    }

    public function aboutUs()
    {
     return Inertia::render('User/AboutUs');
    }

    public function fetchCityImages($city)
    {
        $client = new Client();
        $accessKey = 'mtRswHFcN6cDFBe220U4BDMr_eBMOZua-5c76KYqyKs';
        $url = "https://api.unsplash.com/search/photos?query={$city}&client_id={$accessKey}";

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        // Process the response data and retrieve the image URLs
        $imageUrls = [];
        if (isset($data['results'])) {
            foreach ($data['results'] as $result) {
                if (isset($result['urls']['regular'])) {
                    $imageUrls[] = $result['urls']['regular'];
                }
            }
        }

        return $imageUrls;
    }



}
