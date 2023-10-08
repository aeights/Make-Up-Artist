<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('landing',[
            'about' => $about
        ]);
    }

    public function about()
    {
        $about = About::all();
        return view('about-us',[
            'about' => $about
        ]);
    }

    public function services()
    {
        $services = Service::all();
        return view('service',[
            'services' => $services
        ]);
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
