<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        if ($about->isNotEmpty()) {
            return view('pages.admin.about',[
                'about' => $about
            ]);
        }
        return redirect('dashboard/setting/about/empty');
    }

    public function create()
    {
        return view('pages.admin.about-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|max:200'
        ]);

        if ($validated) {
            $about = About::create($validated);
            return to_route('setting.about')->with('message','About added successfully!');
        }
    }

    public function edit(Request $request)
    {
        $about = About::find($request->id);
        return view('pages.admin.about-edit',[
            'about' => $about,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|max:200'
        ]);

        if ($validated) {
            $about = About::find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return to_route('setting.about')->with('message','About update successfully!');
        }
    }

    public function delete($id)
    {
        $about = About::find($id);
        $about->delete();
        return to_route('setting.about')->with('message','About delete successfully!');
    }
}
