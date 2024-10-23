<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Train;
use App\Models\TrainLog;
use App\Models\TrainStation;
use Exception;
use Illuminate\Http\Request;

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

        return view('user.dashboard', compact('trains', 'todayStatuses','trainList'));
    }

    public function search_train(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'start_station' => 'nullable|string',
                'end_station' => 'nullable|string',
                'date' => 'nullable|date',
            ]);
            $trainList = TrainStation::all();

            // Get the search criteria from the request
            $start_station = $request->input('start_station');
            $end_station = $request->input('end_station');
            $date = $request->input('date');
    
            // Build the query to search for trains
            $query = TrainStation::query();
    
            // Apply filters based on the request input
            if ($start_station) {
                $query->where('start_station', $start_station);
            }
    
            if ($end_station) {
                $query->where('end_station', $end_station);
            }
    
            // Determine the date to use for fetching today's statuses
            if ($date) {
                $today = $date; 
            } else { 
                $today = Carbon::today()->toDateString(); // Ensure it's a string format
            }
    
            // Get today's statuses based on the determined date
            $todayStatuses = TrainLog::ofDay($today)->get();
    
            // Get the paginated results
            $trains = $query->paginate(10);
    
            // Return the view with the filtered trains
            return view('user.dashboard', compact('trains', 'todayStatuses','trainList'));
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to search train: ' . $e->getMessage());
        }
    }
    
}
