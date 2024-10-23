@extends('layout.user-layout') <!-- Extend the layout -->

@section('user-content')

<div class="flex flex-col w-full p-8 mx-auto mt-8 space-y-8 bg-white shadow-2xl max-w-7xl rounded-xl">
    
    <div class="flex flex-row justify-between space-x-8">
        <!-- Train Details Section -->
        <div class="flex-1 p-8 shadow-lg bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl">
            <h3 class="mb-8 text-3xl font-bold text-center text-blue-800">🚂 Train Details</h3>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Train Number:</span>
                <span class="text-blue-800">{{$train->train->trainNumber}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Train Name:</span>
                <span class="text-blue-800">{{$train->train->trainName}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Start Point:</span>
                <span class="text-blue-800">{{$train->start_station}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Arrival Time:</span>
                <span class="text-blue-800">{{$train->time}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Destination Point:</span>
                <span class="text-blue-800">{{$train->end_station}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Departure Time:</span>
                <span class="text-blue-800">{{$train->end}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Status:</span>
                <span class="font-semibold text-green-600">{{ $status ? $status: 'On Time' }}</span>
            </div>
        </div>

        <!-- Fare Information Section -->
        <div class="flex-1 p-8 shadow-lg bg-gradient-to-r from-gray-50 to-yellow-50 rounded-xl">
            <h3 class="mb-8 text-3xl font-bold text-center text-yellow-800">💰 Fare Information</h3>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">1st Class Fare:</span>
                <span class="text-yellow-800">{{$train->train->fare1stClass}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">2nd Class Fare:</span>
                <span class="text-yellow-800">{{$train->train->fare2ndClass}}</span>
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">3rd Class Fare:</span>
                <span class="text-yellow-800">{{$train->train->fare3rdClass}}</span>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="flex justify-center mt-8">
        <a href="javascript:history.back()" class="px-8 py-4 font-semibold text-white transition duration-300 ease-in-out bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg">
            Back to Dashboard
        </a>        
    </div>
</div>




 
@endsection
