@extends('layout.user-layout') <!-- Extend the layout -->

@section('user-content')
    <div class="flex flex-col items-center w-full">

        <!-- Hero Section -->
        <div class="flex flex-col items-center justify-center w-full text-center text-white border border-gray-800 h-80"
            style="background-color: #434343;">
            <h3 class="text-4xl font-medium font-montserrat animate-slide-in">SMART TRAVEL MADE SIMPLE</h3>
            <h1 class="mt-4 overflow-hidden text-2xl text-white animate-fade-in">Effortlessly explore new destinations with
                our quick, real-time e-ticketing system.</h1>
        </div>

        <style>
            /* Slide-in animation */
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-100px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* Fade-in animation */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            /* Apply animations with staggered delays */
            .animate-slide-in {
                animation: slideIn 1.5s ease-out forwards;
                animation-delay: 0s;
                /* First animation */
            }

            .animate-fade-in {
                animation: fadeIn 1.5s ease-in forwards;
                animation-delay: 1.5s;
                /* Second animation with delay */
            }

            /* Ensure the elements are hidden initially */
            .animate-slide-in,
            .animate-fade-in {
                opacity: 0;
            }
        </style>



        <!-- Search Section -->
        {{-- <div class="absolute flex items-center w-4/5 gap-4 mt-10 transition-shadow duration-300 transform bg-transparent rounded-lg shadow-lg opacity-90 justify-evenly" style="border: 2px solid transparent;"> --}}
        <form action="{{ route('search_train') }}" method="POST" class="flex w-4/5 gap-4 p-8 mt-5 bg-white rounded-xl opacity-90">
          @csrf
            <section class="w-1/4">
                <select class="w-full border rounded-xl h-14 px-2" name="start_station">
                    <option value="" selected disabled>Start Point</option>
                    @forelse ($trainList as $train)
                        <option value="{{ $train->start_station }}" class="text-black">{{ $train->start_station }}</option>
                    @empty
                        <option value="" disabled>No trains available</option>
                    @endforelse
                </select>
            </section>
            <section class="w-1/4">
                <select class="w-full border rounded-xl h-14 px-2" name="end_station">
                    <option value="" selected disabled>End Point</option>
                    @forelse ($trainList as $train)
                        <option value="{{ $train->end_station }}" class="text-black">{{ $train->end_station }}</option>
                    @empty
                        <option value="" disabled>No trains available</option>
                    @endforelse
                </select>
            </section>
            <input type="date" name="date" id="dateInput" value="{{ now()->format('Y-m-d') }}"
                class="w-1/4 border rounded-xl h-14 px-2">
            <button class="w-1/4 text-white bg-blue-500 rounded-xl hover:bg-blue-700" type="submit">Search</button>
        </form>



        <!-- Train Table -->
        <div class="w-full mt-8 overflow-x-auto bg-white rounded-lg shadow-lg ">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="text-xs leading-normal text-black uppercase bg-gray-100">
                        <th class="px-6 py-3 text-left">Train Number</th>
                        <th class="px-6 py-3 text-left">Train Name</th>
                        <th class="px-6 py-3 text-left">Start Point</th>
                        <th class="px-6 py-3 text-left">Arrival Time</th>
                        <th class="px-6 py-3 text-left">End Point</th>
                        <th class="px-6 py-3 text-left">Destination Time</th>
                        <th class="px-6 py-3 text-left">Status</th>
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

                            @php
                                // Find today's status for the current train
                                $status = $todayStatuses->where('train_id', $train->train_id)->first();
                            @endphp

                            <td class="px-6 py-3">
                                {{ $status ? $status->status : 'pending' }}
                                <!-- Display the status or a default message -->
                            </td>

                            <td class="px-6 py-3">
                                <!-- Option buttons (e.g., View/Edit/Delete) -->
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="inline-block bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                                        View
                                    </a>
                                    <a href="#"
                                        class="inline-block bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                                        Buy
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No trains found.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="flex justify-between items-center mt-4 mx-5">
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
