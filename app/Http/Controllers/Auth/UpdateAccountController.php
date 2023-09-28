<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.profile',[
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('auth.profile-edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|unique:users,phone,'.Auth::user()->id,
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);
        
        if ($validated) {
            $user = User::find(Auth::user()->id);
            $user->update($validated);
            return to_route('profile')->with('message','Profile updated!');
        }
    }
}
