<?php

namespace App\Http\Controllers;

use App\Models\Train;
use App\Models\TrainLog;
use Exception;
use Illuminate\Http\Request;

class TrainDelayController extends Controller
{
    public function delay_view()
    {
        $trains = Train::all();
        return view('admin.delay-train', compact('trains'));
    }

    public function cancel_view()
    {
        $trains = Train::all();
        return view('admin.cancle-train', compact('trains'));
    }

    public function delay(Request $request)
    {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'trainId' => 'required|exists:trains,id',
                'delayReason' => 'required|string|max:255',
                'departureDate' => 'required|date',
                'hours' => 'required|integer|min:0',
                'minutes' => 'required|integer|min:0|max:59',
                'seconds' => 'required|integer|min:0|max:59',
            ]);

            // Calculate total delay time in seconds
            $totalDelaySeconds = sprintf('%02d:%02d:%02d', $validated['hours'], $validated['minutes'], $validated['seconds']);

            // Use updateOrCreate to handle both updating and creating
            TrainLog::updateOrCreate(
                [
                    'train_id' => $validated['trainId'],            
                    'date' => $validated['departureDate'], 
                ],
                [
                    'reason' => $validated['delayReason'],     
                    'time' =>  $totalDelaySeconds,  
                    'status' => 'delayed', 
                ]
            );

            // Redirect back with success message
            return redirect()->back()->with('success', 'Train delay logged successfully!');
        } catch (Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function cancel(Request $request)
    {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'trainId' => 'required|exists:trains,id',
                'cancellationReason' => 'required|string|max:255',
                'departureDate' => 'required|date',
            ]);

            TrainLog::updateOrCreate(
                [
                    'train_id' => $validated['trainId'],   
                    'date' => $validated['departureDate'], 
                ],
                [
                    'reason' => $validated['cancellationReason'],
                    'status' => 'canceled',
                    'time' => null,   
                ]
            );

            // Redirect back with success message
            return redirect()->back()->with('success', 'Train cancellation logged successfully!');
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
