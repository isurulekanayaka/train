<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\TrainStation;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use App\Mail\PaymentDetailsMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function buy_ticket($id, $date)
    {
        $train = TrainStation::where('id', $id)->first();
        $user = Auth::user();
        return view('user.book-ticket', compact('train', 'user', 'date'));
    }

    public function checkout(Request $request)
    {
        // dd($request);
        $noOfUsers = $request->input('noOfUsers');
        $ticketClass = $request->input('ticketClass');
        $date = $request->input('date');
        $classPrice = $request->input('classPrice');
        $totalPrice = $request->input('totalPrice');
        $train_station_id = $request->input('train_station_id');

        // Pass the variables to the view
        return view('user.checkout', compact('noOfUsers', 'ticketClass', 'date', 'classPrice', 'totalPrice', 'train_station_id'));
    }

    public function payment(Request $request)
    {
        // dd($request);
        // Validate the request data
        try {
            // Your controller method
            $validated = $request->validate([
                'password' => 'required|string|min:8',
                'noOfUsers' => 'required|integer|min:1',
                'ticketClass' => 'required|string',
                'date' => 'required|date|after_or_equal:today',
                'classPrice' => 'required|numeric|min:0',
                'totalPrice' => 'required|numeric|min:0',
                'train_station_id' => 'required|exists:train_stations,id',
                'lat' => 'required',
                'long' => 'required',
            ]);

            $user = Auth::user();

            if (Hash::check($request->password, $user->password)) {
                // Store payment details
                $paymentDetail = new PaymentDetail();
                $paymentDetail->noOfUsers = $validated['noOfUsers'];
                $paymentDetail->ticketClass = $validated['ticketClass'];
                $paymentDetail->date = $validated['date'];
                $paymentDetail->classPrice = $validated['classPrice'];
                $paymentDetail->totalPrice = $validated['totalPrice'];
                $paymentDetail->train_station_id = $validated['train_station_id'];
                $paymentDetail->user_id = $user->id; // Authenticated user

                // Save payment detail
                $paymentDetail->save();

                // Send email to the user and bcc to an additional recipient
                Mail::to($user->email)
                    ->bcc('menulsuwahas@gmail.com') // Sends a blind copy to this additional recipient
                    ->send(new PaymentDetailsMail($paymentDetail, $validated['lat'], $validated['long']));

                // Redirect to the dashboard with a success message
                return redirect()->route('user_dashboard')->with('success', 'Payment successful.');
            } else {
                $noOfUsers = $request->input('noOfUsers');
                $ticketClass = $request->input('ticketClass');
                $date = $request->input('date');
                $classPrice = $request->input('classPrice');
                $totalPrice = $request->input('totalPrice');
                $train_station_id = $request->input('train_station_id');

                // Pass the variables to the view
                return view('user.checkout', compact('noOfUsers', 'ticketClass', 'date', 'classPrice', 'totalPrice', 'train_station_id'))->with('error', 'Invalid password.');
            }
        } catch (Exception $e) {
            // dd($e);
            // Redirect back with an error message
            return redirect()->route('user_dashboard')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
