<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Whishlist;
use Illuminate\Http\Request;

class WhishlistController extends Controller
{
    public function index()
    {
        return inertia('Whishlist', [
            'halls' => Whishlist::getContent()
        ]);
    }

    public function toggle(Hall $hall)
    {
        try {
            Whishlist::toggle($hall);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding/removing item from wishlist.');
        }

        return redirect()->back()->with('success', 'Item added/removed from wishlist successfully.');
    }

    public function moveToCart(Hall $hall)
    {
        Whishlist::moveToCart($hall);
    }

    public function destroy()
    {
        Whishlist::empty();
    }
}
