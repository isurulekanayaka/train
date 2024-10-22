@extends('layout.admin-layout')

@section('admin-content')


<body class="bg-gray-100">
    <div class="flex items-center justify-center w-full">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h5 class="mb-6 text-2xl font-semibold text-center text-gray-800">Update Train Cancellation</h5>

            <form method="POST">
                <!-- Dropdown for selecting Train Number -->
                <div class="mb-4">
                    <label for="trainNumber" class="block text-gray-700"></label>
                    <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" name="trainNumber" id="trainNumber" required>
                        <option value="" disabled selected>Select Train Number</option>
                        <option value="train1">Train 1</option> <!-- Replace with actual train options -->
                        <option value="train2">Train 2</option>
                    </select>
                </div>

                <!-- Input for Cancellation Reason -->
                <div class="mb-4">
                    <label for="cancellationReason" class="block text-gray-700">Reason for Cancellation</label>
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" name="cancellationReason" id="cancellationReason" type="text" placeholder="Reason for Cancellation" required>
                </div>

                <!-- Input for New Departure Date -->
                <div class="mb-4">
                    <label for="departureDate" class="block text-gray-700">New Departure Date</label>
                    <input class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="date" name="departureDate" id="departureDate" required>
                </div>

                <!-- Submit button for updating the cancellation -->
                <button class="w-full py-2 mb-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700" name="update_cancel" type="submit">Update Cancellation</button>

                <!-- Cancel button to go back to the dashboard -->
                <a class="block w-full py-2 text-center text-gray-700 transition bg-gray-300 rounded-md hover:bg-gray-400" href="emp-dashboard.php">Cancel</a>
            </form>
        </div>
    </div>
</body>


@endsection