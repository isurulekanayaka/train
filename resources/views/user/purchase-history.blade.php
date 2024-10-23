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
                <tr class="hover:bg-gray-100">
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b"></td>
                  <td class="px-6 py-4 border-b">
                   
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
  
      
  
      </div>
    </div>
  </body>
  

@endsection
