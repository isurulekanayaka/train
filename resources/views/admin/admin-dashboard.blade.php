@extends('layout.admin-layout')

@section('admin-content')
    <div class="flex flex-col items-center w-full">
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
        <!-- Train Table -->
        <div class="w-full mt-8 overflow-x-auto bg-white rounded-lg shadow-lg ">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="text-xs leading-normal text-black uppercase bg-gray-100">
                        <th class="px-6 py-3 text-left">Train Number</th>
                        <th class="px-6 py-3 text-left">Train Name</th>
                        <th class="px-6 py-3 text-left">Start Point</th>
                        <th class="px-6 py-3 text-left">Start Time</th>
                        <th class="px-6 py-3 text-left">End Point</th>
                        <th class="px-6 py-3 text-left">End Time</th>
                        <th class="px-6 py-3 text-left">First Class</th>
                        <th class="px-6 py-3 text-left">Second Class</th>
                        <th class="px-6 py-3 text-left">Third Class</th>
                        <th class="px-6 py-3 text-left">Option</th>
                    </tr>
                </thead>
                <tbody id="" class="text-sm font-light text-gray-600">
                    @forelse ($trains as $train)
                        <tr>
                            <td class="px-6 py-3">{{ $train->train->trainNumber }}</td>
                            <td class="px-6 py-3">{{ $train->train->trainName }}</td>
                            <td class="px-6 py-3">{{ $train->start_station }}</td>
                            <td class="px-6 py-3">{{ $train->time }}</td>
                            <td class="px-6 py-3">{{ $train->end_station }}</td>
                            <td class="px-6 py-3">{{ $train->end }}</td>
                            <td class="px-6 py-3">{{ number_format($train->train->fare1stClass, 2) }}</td>
                            <td class="px-6 py-3">{{ number_format($train->train->fare2ndClass, 2) }}</td>
                            <td class="px-6 py-3">{{ number_format($train->train->fare3rdClass, 2) }}</td>
                            <td class="px-6 py-3">
                                <!-- Option buttons (e.g., View/Edit/Delete) -->
                                <div class="flex space-x-4">
                                    <a href="{{ route('train_details', ['id' => $train->id]) }}"
                                        class="inline-block bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                                        View
                                    </a>
                                    <a href="{{ route('train_details', ['id' => $train->id]) }}"
                                        class="inline-block bg-yellow-600 text-white px-2 py-1 rounded hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-300">
                                        Edit
                                    </a>

                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No trains found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="flex justify-between items-center mt-4">
                <div class="text-gray-500">
                    Showing {{ $trains->firstItem() }} to {{ $trains->lastItem() }} of {{ $trains->total() }} results
                </div>
                <div>
                    {{ $trains->links() }} <!-- This generates the pagination links -->
                </div>
            </div>
        </div>

    </div>
@endsection
