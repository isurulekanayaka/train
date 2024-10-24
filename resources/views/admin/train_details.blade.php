@extends('layout.admin-layout')

@section('admin-content')

<div class="flex flex-col w-full p-8 mx-auto mt-8 space-y-8 bg-white shadow-2xl max-w-7xl rounded-xl">
    
    <div class="flex flex-row justify-between space-x-8">
        <!-- Train Details Section -->
        <div class="flex-1 p-8 shadow-lg bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl">
            <h3 class="mb-8 text-3xl font-bold text-center text-blue-800">🚂 Train Details</h3>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Train Number:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->train->trainNumber}}">
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Train Name:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->train->trainName}}">
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Start Point:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->start_station}}">
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Arrival Time:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->time}}">
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Destination Point:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->end_station}}">
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">Departure Time:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->end}}">
            </div>

        </div>

        <!-- Fare Information Section -->
        <div class="flex-1 p-8 shadow-lg bg-gradient-to-r from-gray-50 to-yellow-50 rounded-xl">
            <h3 class="mb-8 text-3xl font-bold text-center text-yellow-800">💰 Fare Information</h3>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">1st Class Fare:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->train->fare1stClass}}">
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">2nd Class Fare:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->train->fare2ndClass}}">
            </div>

            <div class="flex justify-between mb-6 text-lg">
                <span class="font-semibold text-gray-700">3rd Class Fare:</span>
                <input type="text" class="border border-gray-300 rounded-lg p-2" value="{{$train->train->fare3rdClass}}">
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