<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|numeric',
            'address' => 'required',
            'role' => 'required'
        ]);

        if ($validated) {
            $user = User::create($validated);
            return to_route('login');
        }
    }
}
