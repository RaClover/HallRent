<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        // to share the cart items into all components
        $cartItems = [];

        if (Auth::check()) {
            // User is logged in
            $user = Auth::user();

            // Show the user's cart items from the database
            $cart = $user->cart;
            if ($cart) {
                $cartItems = $cart->cartItems()->with('item')->get()->toArray();
            }
        } else {
            // User is not logged in, show cart items from session
            $sessionCartItems = session()->get('cart');
            $cartItems = $sessionCartItems;
        }

        $totalAmount = $this->calculateTotalAmount($cartItems);


        return array_merge(parent::share($request), [
            'csrf' => $request->session()->token(),
            'license' => fn () => $request->session()->get('licenseExist'),
            'auth' => [
                'user' => $request->user(),
            ],
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },

            'cartItems' => $cartItems,
            'cartItemCount' => count((array)$cartItems),
            'totalAmount' => $totalAmount,
            'flash' => [
                'message' => $request->session()->get('message')
            ],
        ]);
    }


    private function calculateTotalAmount($cartItems)
    {
        $totalAmount = 0;

        if (is_array($cartItems)) {
            foreach ($cartItems as $item) {
                $totalAmount += $item['quantity'] * $item['item']['price'];
            }
        }

        return $totalAmount;
    }

}
