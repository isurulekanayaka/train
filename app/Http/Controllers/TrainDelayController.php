<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Train;
use App\Models\TrainLog;
use App\Models\TrainStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrainNotification; // Import the new Mailable
use App\Models\PaymentDetail;
use App\Models\User; // Import User model


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
        // dd($request);
        try {
            // Validate the request
            $validated = $request->validate([
                'trainId' => 'required|exists:trains,id',
                'delayReason' => 'required|string|max:255',
                'departureDate' => 'required|date',
                'hours' => 'required|integer|min:0',
                'minutes' => 'required|integer|min:0|max:59',
                'seconds' => 'required|integer|min:0|max:59',
            ]);

            // Calculate delay time
            $totalDelaySeconds = sprintf('%02d:%02d:%02d', $validated['hours'], $validated['minutes'], $validated['seconds']);

            // Update or create the train log
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
            // Retrieve the train details
            $train = Train::find($validated['trainId']);

            // Get all user IDs to send email notifications
            $usersIds = PaymentDetail::whereHas('trainStation', function ($query) use ($validated) {
                $query->where('train_id', $validated['trainId'])
                    ->where('date', $validated['departureDate']);
            })->pluck('user_id');

            // dd(vars: $usersIds);

            // Fetch users based on the retrieved user IDs
            $users = User::whereIn('id', $usersIds)->get();


            // dd($users);

            foreach ($users as $user) {
                if (empty($user->email)) {
                    continue; // Skip users without an email
                }

                // Prepare email details for each user
                $trainDetails = [
                    'user' => $user,
                    'train' => $train,
                    'status' => 'delayed',  // Change 'delayed' if you want to handle other statuses
                    'reason' => $validated['delayReason'],
                    'time' => $totalDelaySeconds,
                    'departureDate' => $validated['departureDate'],
                ];

                // Send email notification
                Mail::to($user->email)->send(new TrainNotification($trainDetails));
            }



            return redirect()->back()->with('success', 'Train delay logged and notifications sent successfully!');
        } catch (Exception $e) {
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

            $train = Train::find($validated['trainId']);

            // Get all user IDs for email notifications
            $userIds = PaymentDetail::whereHas('trainStation', function ($query) use ($validated) {
                $query->where('train_id', $validated['trainId'])
                      ->where('date', $validated['departureDate']);
            })->pluck('user_id');
    
            // Fetch users based on the retrieved user IDs
            $users = User::whereIn('id', $userIds)->get();
    
            // Send email notifications to each user
            foreach ($users as $user) {
                if (empty($user->email)) {
                    continue; // Skip users without an email
                }
    
                // Prepare email details for each user
                $trainDetails = [
                    'user' => $user,
                    'train' => $train,
                    'status' => 'canceled',  // Update status to 'canceled'
                    'reason' => $validated['cancellationReason'],
                    'departureDate' => $validated['departureDate'],
                ];
    
                // Send email notification
                // dd("hiii");
                Mail::to($user->email)->send(new TrainNotification(trainDetails: $trainDetails));
            }



            // Redirect back with success message
            
            return redirect()->back()->with('success', value: 'Train cancel logged and notifications sent successfully!');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
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
            return view('user.dashboard', compact('trains', 'todayStatuses', 'trainList'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to search train: ' . $e->getMessage());
        }
    }

    public function train_profile($id, $status)
    {
        $train = TrainStation::where('id', $id)->first();
        return view('user.train-profile', compact('train', 'status'));
    }
}
