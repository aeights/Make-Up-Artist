<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    public function noData($menu)
    {
        return view('pages.admin.no-data',[
            'menu' => $menu
        ]);
    }

    public function testimonial()
    {
        $testimonials = DB::table('testimonials')
            ->join('appointments', 'testimonials.appointment_id', '=', 'appointments.id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->select('testimonials.id','testimonials.description', 'services.name as service_name', 'services.price as service_price','appointments.date as appointment_date','appointments.id as appointment_id','appointments.payment_method_id as payment_method_id')
            ->get();
        return view('pages.customer.testimonials',[
            'testimonials' => $testimonials
        ]);
    }
}
