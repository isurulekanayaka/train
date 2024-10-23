@extends('layout.user-layout')

@section('user-content')

    <body class="bg-gray-100">

        <!-- Main Container -->
        <div class="container mx-auto mt-8">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="mb-6 text-2xl font-bold text-gray-700">Purchase History</h3>
                <p class="mb-4 text-base text-gray-600">
                    Uncover the story of your journeys! <br> Dive into your purchase history to revisit
                    every ticket, destination, and adventure. Track fares, find your travel companions,
                    and gear up for your next great escape!
                </p>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full min-w-full text-left bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Train Name</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Arrival</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Destination</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Arrival Time</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Passengers</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Fare per Person</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Total Fare</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Purchase Date</th>
                                <th class="px-6 py-3 font-medium text-gray-700 border-b bg-gray-50">Purchase Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 border-b">{{ $detail->trainStation->train->trainName }}</td>
                                    <td class="px-6 py-4 border-b">{{ $detail->trainStation->start_station }}</td>
                                    <td class="px-6 py-4 border-b">{{ $detail->trainStation->end_station }}</td>
                                    <td class="px-6 py-4 border-b">{{ $detail->trainStation->time }}</td>
                                    <td class="px-6 py-4 border-b">{{ $detail->noOfUsers }}</td>
                                    <td class="px-6 py-4 border-b">{{ number_format($detail->classPrice, 2) }}</td>
                                    <td class="px-6 py-4 border-b">{{ number_format($detail->totalPrice, 2) }}</td>
                                    <td class="px-6 py-4 border-b">
                                        {{ \Carbon\Carbon::parse($detail->date)->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 border-b">Success</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-4 border-b text-center text-gray-500">No purchase
                                        history available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="flex justify-between items-center mt-4 mx-5">
                        <div class="text-gray-500">
                            Showing {{ $details->firstItem() }} to {{ $details->lastItem() }} of {{ $details->total() }}
                            results
                        </div>
                        <div>
                            {{ $details->links() }} <!-- This generates the pagination links -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
