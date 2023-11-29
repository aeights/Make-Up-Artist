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

class CustomerAppointmentController extends Controller
{
    public function empty()
    {
        return view('pages.customer.appointments-empty');
    }

    public function history()
    {
        $appointments = Appointment::where('user_id',Auth::user()->id)->where('status','Completed')->get();
        return view('pages.customer.appointment-history',[
            'appointments' => $appointments
        ]);
    }

    public function payment($id)
    {
        return view('pages.customer.payment',[
            'appointment_id' => $id
        ]);
    }

    public function paymentStore(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
            'type' => 'required',
            'name' => 'required',
            'account_number' => 'required'
        ]);

        if ($validated) {
            $payment = Payment::create([
                'user_id' => Auth::user()->id,
                'appointment_id' => $request->appointment_id,
                'type' => $request->type,
                'name' => $request->name,
                'account_number' => $request->account_number,
            ]);

            $payment->addMediaFromRequest('image')->toMediaCollection('evidence');
            $appointment = Appointment::find($request->appointment_id)->update(['status' => 'Verification']);

            return to_route('cust.list.appointments')->with('Payment successfully!');
        }
    }

    public function index()
    {
        $appointments = Appointment::where('status','!=','Completed')->where('user_id',Auth::user()->id)->orderBy('status','desc')->get();
        if ($appointments->isNotEmpty()) {
            return view('pages.customer.appointments',[
                'appointments' => $appointments
            ]);
        }
        return to_route('cust.appointments.empty');
    }

    public function create()
    {
        $appointments = Appointment::where('status','Accepted')->orderBy('status')->get();
        $customer = User::where('role','customer')->orderBy('name')->get();
        $services = Service::all();
        $payments = PaymentMethod::all();
        return view('pages.customer.appointment-add',[
            'services' => $services,
            'customer' => $customer,
            'appointments' => $appointments,
            'payments' => $payments,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required',
            'payment_method_id' => 'required',
            'date' => 'required'
        ]);

        if ($validated) {
            $check = Appointment::where('date', $request->date)->whereNotIn('status', ['Completed','Rejected'])->get();
            if ($check->isNotEmpty()) {
                return back()->with('message','The appointment schedule has been taken');
            }

            $appointment = Appointment::create([
                'user_id' => Auth::user()->id,
                'service_id' => $request->service_id,
                'payment_method_id' => $request->payment_method_id,
                'date' => $request->date,
                'appointment_time' => Carbon::now(),
            ]);
            return to_route('cust.list.appointments')->with('message','Appointment added successfully!');
        }
    }

    public function edit(Request $request)
    {
        $appointments = Appointment::where('status','Accepted')->orderBy('status')->get();
        $appointment = Appointment::find($request->id);
        $services = Service::all();
        $payments = PaymentMethod::all();
        return view('pages.customer.appointment-edit',[
            'appointment' => $appointment,
            'appointments' => $appointments,
            'services' => $services,
            'payments' => $payments,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required',
            'date' => 'required',
            'payment_method_id' => 'required',
            'date' => 'required|unique:appointments,date,'.$request->id
        ]);

        if ($validated) {
            $appointment = Appointment::find($request->id)->update([
                'user_id' => Auth::user()->id,
                'service_id' => $request->service_id,
                'payment_method_id' => $request->payment_method_id,
                'date' => $request->date,
                'appointment_time' => Carbon::now(),
            ]);
            return to_route('cust.list.appointments')->with('message','Appointment update successfully!');
        }
    }

    public function delete($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return to_route('cust.list.appointments')->with('message','Appointment delete successfully!');
    }
}
