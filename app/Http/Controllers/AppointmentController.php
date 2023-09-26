<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

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
        $services = Service::all();
        $customer = User::where('role','customer')->orderBy('name')->get();
        return view('pages.admin.appointment-add',[
            'services' => $services,
            'customer' => $customer,
            'appointments' => $appointments,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'date' => 'required|unique:appointments,date'
        ]);

        if ($validated) {
            $appointment = Appointment::create($validated);
            return to_route('setting.appointments')->with('message','Appointment added successfully!');
        }
    }

    public function edit(Request $request)
    {
        $appointment = Appointment::find($request->id);
        return view('pages.admin.appointment-edit',[
            'appointment' => $appointment,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'date' => 'required'
        ]);

        if ($validated) {
            $appointment = Appointment::find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return to_route('setting.appointments')->with('message','Appointment update successfully!');
        }
    }

    public function delete($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return to_route('setting.appointments')->with('message','Appointment delete successfully!');
    }
}
