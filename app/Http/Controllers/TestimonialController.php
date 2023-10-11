<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = DB::table('testimonials')
            ->join('appointments', 'testimonials.appointment_id', '=', 'appointments.id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->where('testimonials.user_id',Auth::user()->id)
            ->select('testimonials.id','testimonials.description', 'services.name as service_name', 'services.price as service_price','appointments.date as appointment_date','appointments.id as appointment_id','appointments.payment_method_id as payment_method_id')
            ->get();
        return view('pages.customer.testimonials',[
            'testimonials' => $testimonials
        ]);
    }

    public function create(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $payment = Payment::where('appointment_id',$request->id)->first();
        return view('pages.customer.testimonial-add',[
            'appointment' => $appointment,
            'payment' => $payment,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'appointment_id' => 'required',
            'description' => 'required'
        ]);
    
        if ($validated) {
            $testimonial = Testimonial::create($validated);
            return to_route('cust.list.testimonials')->with('message','Testimonial add successfully!');
        }
    }

    public function edit(Request $request)
    {
        $testimonial = Testimonial::find($request->testimonial_id);
        $appointment = Appointment::find($request->appointment_id);
        $payment = PaymentMethod::find($request->payment_method_id);
        return view('pages.customer.testimonial-edit',[
            'testimonial' => $testimonial,
            'appointment' => $appointment,
            'payment' => $payment,
        ]);
    }

    public function update()
    {

    }
}
