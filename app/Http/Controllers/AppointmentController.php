<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function empty()
    {
        return view('pages.admin.appointments-empty');
    }

    public function history()
    {
        $appointments = Appointment::where('status','Completed')->get();
        return view('pages.admin.appointment-history',[
            'appointments' => $appointments
        ]);
    }

    public function index()
    {
        $appointments = Appointment::where('status','!=','Completed')->orderBy('status','desc')->get();
        if ($appointments->isNotEmpty()) {
            return view('pages.admin.appointments',[
                'appointments' => $appointments
            ]);
        }
        return redirect('dashboard/appointments/empty');
    }

    public function create()
    {
        $appointments = Appointment::where('status','Accepted')->orderBy('status')->get();
        $customer = User::where('role','customer')->orderBy('name')->get();
        $services = Service::all();
        $payments = PaymentMethod::all();
        return view('pages.admin.appointment-add',[
            'services' => $services,
            'customer' => $customer,
            'appointments' => $appointments,
            'payments' => $payments,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'payment_method_id' => 'required',
            'date' => 'required|unique:appointments,date'
        ]);

        if ($validated) {
            $appointment = Appointment::create([
                'user_id' => $request->user_id,
                'service_id' => $request->service_id,
                'payment_method_id' => $request->payment_method_id,
                'date' => $request->date,
                'appointment_time' => Carbon::now(),
            ]);
            return to_route('list.appointments')->with('message','Appointment added successfully!');
        }
    }

    public function edit(Request $request)
    {
        $appointments = Appointment::where('status','Accepted')->orderBy('status')->get();
        $appointment = Appointment::find($request->id);
        $customer = User::where('role','customer')->orderBy('name')->get();
        $services = Service::all();
        $payments = PaymentMethod::all();
        $payment = Payment::where('appointment_id',$appointment->id)->first();
        return view('pages.admin.appointment-edit',[
            'appointment' => $appointment,
            'appointments' => $appointments,
            'services' => $services,
            'customer' => $customer,
            'payments' => $payments,
            'payment' => $payment,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'date' => 'required',
            'payment_method_id' => 'required',
            'date' => 'required|unique:appointments,date,'.$request->id,
            'status' => 'required'
        ]);

        if ($validated) {
            $appointment = Appointment::find($request->id)->update([
                'user_id' => $request->user_id,
                'service_id' => $request->service_id,
                'payment_method_id' => $request->payment_method_id,
                'date' => $request->date,
                'status' => $request->status,
                'appointment_time' => Carbon::now(),
            ]);
            return to_route('list.appointments')->with('message','Appointment update successfully!');
        }
    }

    public function delete($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return to_route('list.appointments')->with('message','Appointment delete successfully!');
    }
}
