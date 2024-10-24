<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Train;
use App\Models\TrainStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrainController extends Controller
{

    public function add_trainView()
    {
        return view('admin.add-train');
    }
    public function add_train(Request $request)
    {
        // Dump the request data for debugging (remove this in production)
        // dd($request);

        try {
            // Validate the request
            $request->validate([
                "trainNumber" => "required|string",
                "trainName" => "required|string",
                "startPoint" => "required|string",
                "endPoint" => "required|string",
                "fare1stClass" => "required|numeric",
                "fare2ndClass" => "required|numeric",
                "fare3rdClass" => "required|numeric",
                "start_station" => "required|array|min:1",
                "start_station.*" => "required|string",
                "end_station" => "required|array|min:1",
                "end_station.*" => "required|string",
                "time" => "required|array|min:1",
                "time.*" => "required|date_format:H:i",
                "end" => "required|array|min:1",
                "end.*" => "required|date_format:H:i",
            ]);

            // Create the Train record
            $train = Train::create([
                'trainNumber' => $request->trainNumber,
                'trainName' => $request->trainName,
                'startPoint' => $request->startPoint,
                'endPoint' => $request->endPoint,
                'fare1stClass' => $request->fare1stClass,
                'fare2ndClass' => $request->fare2ndClass,
                'fare3rdClass' => $request->fare3rdClass,
            ]);

            // Ensure that the station and time arrays are of the same length
            if (
                count($request->start_station) !== count($request->end_station) ||
                count($request->end_station) !== count($request->time)
            ) {
                return redirect()->back()->with('error', 'Mismatch in the number of start stations, end stations, or times.');
            }

            // Loop through the stations and create TrainStation records
            foreach ($request->start_station as $index => $stationName) {
                try {
                    $stationData = [
                        'train_id' => $train->id, // Foreign key to the train
                        'time' => $request->time[$index], // Corresponding time for the station
                        'end' => $request->end[$index], // Corresponding time for the station
                        'end_station' => $request->end_station[$index], // Corresponding end station
                        'start_station' => $stationName, // Start station from the request
                    ];

                    Log::info('Creating station:', $stationData);
                    TrainStation::create($stationData);
                } catch (Exception $e) {
                    Log::error('Failed to create station: ' . $e->getMessage());
                }
            }

            return redirect()->back()->with('success', 'Train added successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add train: ' . $e->getMessage());
        }
    }


    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|exists:train_stations,id',
                'time' => 'required|date_format:H:i:s',
                'end' => 'required|date_format:H:i:s',
                'start_station' => 'required|string|max:255',
                'end_station' => 'required|string|max:255',
                'trainNumber' => 'required|string|max:255',
                'trainName' => 'required|string|max:255',
                'fare1stClass' => 'required|numeric',
                'fare2ndClass' => 'required|numeric',
                'fare3rdClass' => 'required|numeric',
            ]);

            // dd($request);
            // Find the TrainStation record
            $trainStation = TrainStation::findOrFail($request->id);

            // Update the TrainStation record
            $trainStation->update([
                'time' => $request->time,
                'end' => $request->end,
                'start_station' => $request->start_station,
                'end_station' => $request->end_station,
            ]);

            // Find the associated Train record using train_id from TrainStation
            $train = Train::findOrFail($trainStation->train_id);

            // Update the Train record
            $train->update([
                'trainNumber' => $request->trainNumber,
                'trainName' => $request->trainName,
                'fare1stClass' => $request->fare1stClass,
                'fare2ndClass' => $request->fare2ndClass,
                'fare3rdClass' => $request->fare3rdClass,
            ]);

            // Redirect to the admin dashboard with a success message
            return redirect()->route('admin_dashboard')->with([
                'success' => 'Train and Train Station updated successfully'
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update train: ' . $e->getMessage());
        }
    }
}
