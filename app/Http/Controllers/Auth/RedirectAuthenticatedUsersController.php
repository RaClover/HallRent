<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        elseif(auth()->user()->role == 'user'){
            return redirect()->route('homePage');
        }
        elseif(auth()->user()->role == 'super'){
            return redirect()->route('super.dashboard');
        }

        elseif(auth()->user()->role == 'partner'){
            return redirect()->route('partner.dashboard');
        }
        else{
            return auth()->logout();
        }
    }
}
