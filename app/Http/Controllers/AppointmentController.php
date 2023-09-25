<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointment = Appointment::all();
        if ($appointment->isNotEmpty()) {
            return view('pages.admin.appointments',[
                'appointment' => $appointment
            ]);
        }
        return redirect('dashboard/setting/about/empty');
    }

    public function create()
    {
        $services = Service::all();
        $customer = User::where('role','customer')->get();
        return view('pages.admin.appointment-add',[
            'services' => $services,
            'customer' => $customer
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'service_id' => 'required',
            'date' => 'required'
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
