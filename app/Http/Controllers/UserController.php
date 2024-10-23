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
}
