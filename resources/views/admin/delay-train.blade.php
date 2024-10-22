@extends('layout.admin-layout')

@section('admin-content')

<body class="bg-gray-100">
    <div class="flex items-center justify-center w-full">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h5 class="mb-4 text-lg font-bold text-center">Update Train Status</h5>

            <form method="POST">
                <!-- Dropdown for selecting Train Number -->
                <div class="mb-4">
                    <label for="trainNumber" class="block text-gray-700">Select Train Number</label>
                    <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" name="trainNumber" id="trainNumber" required>
                        <option value="" disabled selected>Select Train Number</option>
                        <option value="">Train 1</option> <!-- Replace with actual train options -->
                        <option value="">Train 2</option>
                    </select>
                </div>

                <!-- Input for Delay Reason -->
                <div class="mb-4">
                    <label for="delayReason" class="block text-gray-700">Reason for Delay</label>
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" name="delayReason" id="delayReason" type="text" placeholder="Reason for Delay" required>
                </div>

                <!-- Input for New Departure Date -->
                <div class="mb-4">
                    <label for="departureDate" class="block text-gray-700">New Departure Date</label>
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="date" name="departureDate" id="departureDate" required>
                </div>

                <!-- Input for Delay Time -->
                <div class="mb-4">
                    <label for="departureTime" class="block text-gray-700">Delay Time</label>
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="time" name="departureTime" id="departureTime" required>
                </div>

                <!-- Button to submit the form for updating delay -->
                <button class="w-full py-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700" name="update_delay" type="submit">Update Delay</button>

                <!-- Cancel button to navigate back -->
                <a class="block w-full py-2 mt-2 text-center text-gray-700 transition bg-gray-300 rounded-md hover:bg-gray-400" href="emp-dashboard.php">Cancel</a>
            </form>
        </div>
    </div>
    
</body>








@endsection