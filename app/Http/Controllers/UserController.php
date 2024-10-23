<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use Carbon\Carbon;
use App\Models\Train;
use App\Models\TrainLog;
use App\Models\TrainStation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_dashboard()
    {
        // Get the paginated train stations
        $trains = TrainStation::paginate(10);

        $trainList = TrainStation::all();
        // Get today's date
        $today = Carbon::today(); // or use date('Y-m-d') for a simple approach

        // Get train statuses for today
        $todayStatuses = TrainLog::ofDay($today)->get();

        return view('user.dashboard', compact('trains', 'todayStatuses', 'trainList'));
    }

    public function history()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Retrieve payment details for the authenticated user
        $details = PaymentDetail::where('user_id', $userId)->paginate(10); // Use get() to retrieve results

        // Pass the details to the view
        return view('user.purchase-history', compact('details'));
    }

    public function User_profile()
    {
        $user = Auth::user();
        return view('user.user-profile', compact('user'));
    }
    public function change_details(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'userFullName' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255',
            'userContact' => 'required|string|max:255',
            'userNic' => 'nullable|string|max:255',
            'userBday' => 'required|date|before:today',
            'userAddress' => 'nullable|string|max:255',
        ]);

        try {
            // Get the currently authenticated user
            $user = Auth::user();

            // Update user profile details
            $user->full_name = $validated['userFullName'];
            $user->email = $validated['userEmail'];
            $user->contact = $validated['userContact'];
            $user->nic = $validated['userNic'];
            $user->dob = $validated['userBday'];
            $user->address = $validated['userAddress'];

            // Save the updated user details
            $user->save();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (Exception $e) {
            // Handle the exception and redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while updating your profile: ' . $e->getMessage());
        }
    }


    public function change_password(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'oldPassword' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed', // Use the confirmed rule to validate new password
        ]);
        try {
            // Get the currently authenticated user
            $user = Auth::user();

            // Check if the old password matches the hashed password in the database
            if (Hash::check($validated['oldPassword'], $user->password)) {
                // Update the user's password
                $user->password = Hash::make($validated['password']);
                $user->save();

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Password changed successfully.');
            } else {
                // Redirect back with an error message if the old password is incorrect
                return redirect()->back()->with('error', 'Old password is incorrect.');
            }
        } catch (Exception $e) {
            // Handle the exception and redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while changing your password: ' . $e->getMessage());
        }
    }
}
