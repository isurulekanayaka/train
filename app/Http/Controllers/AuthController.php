<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

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

    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log in with the provided credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Get the authenticated user's role
            $role = Auth::user()->role;

            // Redirect based on the user's role
            if ($role == 'admin') {
                return redirect()->route('admin_dashboard');
            } else {
                return redirect()->route('user_dashboard');
            }
        }

        // If authentication fails, return back with an error
        return redirect()->back()->with('error', 'Invalid login credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/login'); // Redirect to login page or home page
    }

    public function frogot_view()
    {
        return view('auth.froget_password');
    }

    public function froget_password(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

            // Generate a password reset token
            $token = Password::getRepository()->create($user = User::where('email', $request->email)->first());

            // Send the email
            Mail::to($request->email)->send(new ForgotPassword($request->email, $token));

            return redirect()->back()->with('success', 'Password reset link has been sent to your email.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function showResetForm(Request $request)
    {
        $token = $request->route('token'); // Get the token from the URL
        $email = $request->route('email'); // Get the email from the URL

        return view('auth.reset_password', compact('token', 'email'));
    }

    public function reset_password(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|confirmed|min:8', // Ensure the password is confirmed and meets minimum length
            ]);

            // Find the user by email
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }

            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();

            // Optionally, log the user in or send a success message
            return redirect()->route('login')->with('success', 'Password has been reset successfully.');
        } catch (Exception $e) {
            // Handle exceptions
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
