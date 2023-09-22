<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function about()
    {
        return view('about-us');
    }

    public function services()
    {
        return view('service');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'customer') {
                return to_route('dashboard.customer');
            }
            return to_route('dashboard.admin');
        }
        return to_route('login');
    }
}
