@extends('layout.admin-layout')

@section('admin-content')
    <!-- Success/Error Alerts -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <body class="bg-gray-100">
        <div class="flex items-center justify-center w-full">
            <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
                <h5 class="mb-4 text-lg font-bold text-center">Update Train Status</h5>

                <form action="{{ route('train_delay') }}" method="POST">
                    @csrf
                    <!-- Dropdown for selecting Train Number -->
                    <div class="mb-4">
                        <label for="trainId" class="block text-gray-700">Select Train Number</label>
                        <select
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            name="trainId" id="trainId" required>
                            <option value="" disabled selected>Select Train Number</option>
                            @forelse ($trains as $train)
                                <option value="{{ $train->id }}">{{ $train->trainNumber }} - {{ $train->trainName }}
                                </option>
                            @empty
                                <option value="" disabled>No trains available</option>
                            @endforelse
                        </select>
                    </div>

                    <!-- Input for Delay Reason -->
                    <div class="mb-4">
                        <label for="delayReason" class="block text-gray-700">Reason for Delay</label>
                        <input
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            name="delayReason" id="delayReason" type="text" placeholder="Reason for Delay" required>
                    </div>

                    <!-- Input for New Departure Date -->
                    <div class="mb-4">
                        <label for="departureDate" class="block text-gray-700">New Departure Date</label>
                        <input
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            type="date" name="departureDate" id="departureDate" required>
                    </div>

                    <!-- Input for Delay Time -->
                    <div class="mb-4">
                        <label for="delayTime" class="block text-gray-700">Delay Time (HH:MM:SS)</label>
                        <div class="flex space-x-2">
                            <input
                                class="block w-1/3 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                type="number" name="hours" id="hours" min="0" placeholder="HH" required>
                            <input
                                class="block w-1/3 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                type="number" name="minutes" id="minutes" min="0" max="59" placeholder="MM"
                                required>
                            <input
                                class="block w-1/3 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                type="number" name="seconds" id="seconds" min="0" max="59" placeholder="SS"
                                required>
                        </div>
                    </div>

                    <!-- Button to submit the form for updating delay -->
                    <button class="w-full py-2 text-white transition bg-blue-600 rounded-md hover:bg-blue-700"
                        type="submit">Update Delay</button>

                    <!-- Cancel button to navigate back -->
                    <a class="block w-full py-2 mt-2 text-center text-gray-700 transition bg-gray-300 rounded-md hover:bg-gray-400"
                        href="{{ route('admin_dashboard') }}">Cancel</a>
                </form>
            </div>
        </div>

    </body>
@endsection
