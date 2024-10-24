@extends('layout.admin-layout')

@section('admin-content')

<div class="container w-full p-5 mx-auto">
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
    <main class="p-5 bg-white rounded-lg shadow-md">
        <section class="mb-4">
            <h1 class="mb-2 text-xl font-bold">Train Details</h1>
            <div class="flex items-center mb-4">
                <input type="search" placeholder="Search Data..." class="w-full px-4 py-2 mr-2 border border-gray-300 rounded-lg">
                <button class="px-4 py-2 text-white bg-blue-600 rounded-lg">Search</button>
            </div>
        </section>
        <section>
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border border-gray-300">Train Number</th>
                        <th class="px-4 py-2 border border-gray-300">Train Name</th>
                        <th class="px-4 py-2 border border-gray-300">Current Station</th>
                        <th class="px-4 py-2 border border-gray-300">Destination Station</th>
                        <th class="px-4 py-2 border border-gray-300">Arrival Time</th>
                        <th class="px-4 py-2 border border-gray-300">Departure Time</th>
                        <th class="px-4 py-2 border border-gray-300">1st Class</th>
                        <th class="px-4 py-2 border border-gray-300">2nd Class</th>
                        <th class="px-4 py-2 border border-gray-300">3rd Class</th>
                        <th class="px-4 py-2 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border border-gray-300">12345</td>
                        <td class="px-4 py-2 border border-gray-300">Express Train</td>
                        <td class="px-4 py-2 border border-gray-300">Station A</td>
                        <td class="px-4 py-2 border border-gray-300">Station B</td>
                        <td class="px-4 py-2 border border-gray-300">10:00 AM</td>
                        <td class="px-4 py-2 border border-gray-300">10:30 AM</td>
                        <td class="px-4 py-2 border border-gray-300">$50</td>
                        <td class="px-4 py-2 border border-gray-300">$30</td>
                        <td class="px-4 py-2 border border-gray-300">$20</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <a class="text-red-600 hover:underline" href="#" onclick="return confirm('Are you sure you want to delete this train?');">Delete</a>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </section>
    </main>
</div>

@endsection