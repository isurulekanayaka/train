<?php

namespace App\Http\Controllers;

use App\Models\Train;
use App\Models\TrainStation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        // Use the paginate() method to get paginated results
        $trains = TrainStation::paginate(10); // This retrieves 10 train records per page
    
        return view('admin.admin-dashboard', compact('trains'));
    }    

    public function all_users()
    {
        $users = User::paginate(10);

        return view('admin.users', compact('users'));
    }

    public function edit_profile($id)
    {
        $user = User::find($id);
        return view('admin.user-profile', compact('user'));
    }

    public function train_details($id)
    {
        $train = TrainStation::find($id);
        return view('admin.train_details', compact('train'));
    }
}
