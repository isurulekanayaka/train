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

    <form action="{{ route('add_train') }}" method="POST" class="w-full mx-auto gap-5 ">
        @csrf
        <div class="flex flex-col md:flex-row w-4/5 mx-auto gap-5">

            <!-- Train Details Section -->
            <div class="p-6 mt-8 bg-white rounded-lg shadow-md w-full h-fit">

                <div class="mb-4 text-xl font-semibold text-center">Fill the Train Details</div>

                <!-- Train Number -->
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div class="form-group">
                        <input
                            class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                            name="trainNumber" id="trainNumber" type="number" placeholder="Train Number" required />
                    </div>
                </div>

                <!-- Train Name -->
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div class="form-group">
                        <input
                            class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                            name="trainName" id="trainName" type="text" placeholder="Train Name" required />
                    </div>
                </div>

                <!-- Start Station -->
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div class="form-group">
                        <input
                            class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                            name="startPoint" id="startPoint" type="text" placeholder="Start Station" required />
                    </div>
                </div>

                <!-- End Station -->
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div class="form-group">
                        <input
                            class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                            name="endPoint" id="endPoint" type="text" placeholder="Start Station" required />
                    </div>
                </div>

                <!-- Fare Inputs -->
                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div class="form-group">
                        <input
                            class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                            name="fare1stClass" id="fare1stClass" type="number" placeholder="1st Class Fare" required />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div class="form-group">
                        <input
                            class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                            name="fare2ndClass" id="fare2ndClass" type="number" placeholder="2nd Class Fare" required />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 mb-4">
                    <div class="form-group">
                        <input
                            class="w-full px-4 py-2 border rounded-lg form-control focus:outline-none focus:ring focus:ring-blue-500"
                            name="fare3rdClass" id="fare3rdClass" type="number" placeholder="3rd Class Fare" required />
                    </div>
                </div>
            </div>

            <!-- Station Details Section -->
            <div class=" w-full">


                <div class="p-6  mt-8 bg-white rounded-lg shadow-md w-full">
                    <div class="mb-4 text-xl font-semibold text-center">Fill the Station Details</div>

                    <!-- Station Name and Time -->
                    <div class="" id="duplicate-container">
                        <div class="flex flex-col mb-2 pb-1 border-b" id="duplicate">
                            <div class="form-group w-full flex gap-1">
                                <input class="w-2/4 px-4 py-2 border rounded-lg form-control focus:outline-none mb-1"
                                    name="start_station[]" id="start_station_1" type="text" placeholder="Station Start"
                                    required />
                                <input class="w-1/4 px-4 py-2 border rounded-lg form-control focus:outline-none mb-1"
                                    name="time[]" id="time_1" type="time" placeholder="Time" required />
                            </div>
                            <div class="form-group w-full">
                                <div class="flex gap-1">
                                    <input class="w-2/4 px-4 py-2 border rounded-lg form-control focus:outline-none"
                                        name="end_station[]" id="end_station_1" type="text" placeholder="Station End"
                                        required />
                                    <input class="w-1/4 px-4 py-2 border rounded-lg form-control focus:outline-none"
                                        name="end[]" id="end_1" type="time" placeholder="Time" required />
                                    <!-- Empty div for dynamically added remove button in duplicates -->
                                    <div class="remove-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        let stationCount = 1;

                        function addStation() {
                            stationCount++;

                            // Clone the original div and its content
                            let originalDiv = document.getElementById('duplicate');
                            let newDiv = originalDiv.cloneNode(true);

                            // Clear the values for the cloned inputs
                            newDiv.querySelector('input[name="start_station[]"]').value = '';
                            newDiv.querySelector('input[name="end_station[]"]').value = '';
                            newDiv.querySelector('input[name="time[]"]').value = '';
                            newDiv.querySelector('input[name="end[]"]').value = '';

                            // Remove any previous remove buttons in the clone (if applicable)
                            let removeContainer = newDiv.querySelector('.remove-container');
                            removeContainer.innerHTML = '';

                            // Add remove button only to duplicated divs (not the original one)
                            if (stationCount > 1) {
                                removeContainer.innerHTML = `
                <button type="button" onclick="removeStation(this)" class="text-white p-1 rounded-full border hover:animate-bounce w-9">
                    <img src="{{ asset('icon/bin.png') }}" alt="Remove" class="w-8">
                </button>
            `;
                            }

                            // Append the cloned div to the container
                            document.getElementById('duplicate-container').appendChild(newDiv);
                        }

                        function removeStation(button) {
                            // Remove the parent div of the clicked remove button
                            let parentDiv = button.closest('.flex.flex-col');
                            parentDiv.remove();
                        }
                    </script>


                    <!-- Add Station Button -->
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div class="form-group mx-auto">
                            <button type="button" onclick="addStation()"
                                class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600">
                                Add Station
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="flex justify-end gap-5 mt-5">
                    <button class="px-4 py-2 text-white bg-blue-500 rounded-lg btn hover:bg-blue-600"type="submit">
                        Add Train
                    </button>
                    <a class="px-4 py-2 text-white bg-gray-500 rounded-lg btn hover:bg-gray-600"
                        href="{{ route('admin_dashboard') }}">Cancel</a>
                </div>
            </div>
        </div>

    </form>
@endsection
