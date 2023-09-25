<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        if ($services->isNotEmpty()) {
            return view('pages.admin.services',[
                'services' => $services
            ]);
        }
        return redirect('dashboard/setting/services/empty');
    }

    public function create()
    {
        return view('pages.admin.service-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'numeric',
            'description' => 'required|max:200'
        ]);

        if ($validated) {
            $service = Service::create($validated);
            return to_route('setting.services')->with('message','Service added successfully!');
        }
    }

    public function edit(Request $request)
    {
        $service = Service::find($request->id);
        return view('pages.admin.service-edit',[
            'service' => $service,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'numeric',
            'description' => 'required|max:200'
        ]);

        if ($validated) {
            $service = Service::find($request->id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            ]);
            return to_route('setting.services')->with('message','Service update successfully!');
        }
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
        return to_route('setting.services')->with('message','Service delete successfully!');
    }
}
