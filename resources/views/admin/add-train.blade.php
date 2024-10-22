@extends('layout.admin-layout')

@section('admin-content')



 <div class="container mx-auto">
    <form method="" action="" class="max-w-xl p-6 mx-auto mt-8 bg-white rounded-lg shadow-md" onsubmit="return validateForm();">
        
        <div class="mb-4 text-xl font-semibold text-center">Fill the Train Details</div>

        <!-- Train Number and Train Name -->
        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
            <div class="form-group">
                <input
                    autocomplete="off"
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="trainNumber"
                    id="trainNumber"
                    type="number"
                    placeholder="Train Number"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="trainName"
                    id="trainName"
                    type="text"
                    placeholder="Train Name"
                    required
                />
            </div>
        </div>

        <!-- Station Name and Start Station -->
        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="stationName"
                    id="stationName"
                    type="text"
                    placeholder="Station Name"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="startPoint"
                    id="startPoint"
                    type="text"
                    placeholder="Start Station"
                    required
                />
            </div>
        </div>

        <!-- Destination Station -->
        <div class="mb-4 form-group">
            <input
                class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                name="destinationPoint"
                id="destinationPoint"
                type="text"
                placeholder="Destination Station"
                required
            />
        </div>

        <!-- Arrival and Departure Time -->
        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="arrivalTime"
                    id="arrivalTime"
                    type="text"
                    placeholder="Arrival Time"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="departureTime"
                    id="departureTime"
                    type="text"
                    placeholder="Departure Time"
                    required
                />
            </div>
        </div>

        <!-- Fare Inputs -->
        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-3">
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="fare1stClass"
                    id="fare1stClass"
                    type="text"
                    placeholder="1st Class Fare"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="fare2ndClass"
                    id="fare2ndClass"
                    type="text"
                    placeholder="2nd Class Fare"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                    name="fare3rdClass"
                    id="fare3rdClass"
                    type="text"
                    placeholder="3rd Class Fare"
                    required
                />
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">
            <button class="px-4 py-2 text-white bg-blue-500 rounded-lg btn hover:bg-blue-600" name="add_train" type="submit">
                Add Train
            </button>
            <a class="px-4 py-2 text-white bg-gray-500 rounded-lg btn hover:bg-gray-600" href="{{ route('admin.dashboard') }}">Cancel</a>
        </div>
    </form>
</div> 




@endsection