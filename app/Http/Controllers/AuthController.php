<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login_view()
    {
        return view('auth.login');
    }

    // Handle user registration
    public function register(Request $request)
    {
        try {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'contact' => 'required|string',
                'nic' => 'required|string|max:20|unique:users',
                'address' => 'required|string',
                'dob' => 'required|date',
                'password' => 'required|string|min:8|confirmed',
            ]);
            // dd($request);

            // Hash the password before storing it
            $user = User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'contact' => $request->contact,
                'nic' => $request->nic,
                'address' => $request->address,
                'dob' => $request->dob,
                'password' => Hash::make($request->password), // Hashing the password
                'role' => 'user', // default role
            ]);

            return redirect()->back()->with('success', 'User registered successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage()); // Get the error message as string
        }
    }
}
