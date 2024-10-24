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
        $details = PaymentDetail::where('user_id', operator: $userId)->paginate(10); // Use get() to retrieve results
    
        // Pass the details to the view
        return view('user.purchase-history', compact('details'));
    }
    
}
