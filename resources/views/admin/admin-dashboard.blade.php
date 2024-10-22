@extends('layout.admin-layout')

@section('admin-content')

<div class="flex flex-col items-center w-full">
    <!-- Train Table -->
    <div class="w-full mt-8 overflow-x-auto bg-white rounded-lg shadow-lg ">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="text-xs leading-normal text-black uppercase bg-gray-100">
                    <th class="px-6 py-3 text-left">Train Number</th>
                    <th class="px-6 py-3 text-left">Train Name</th>
                    <th class="px-6 py-3 text-left">Train Station</th>
                    <th class="px-6 py-3 text-left">Start Point</th>
                    <th class="px-6 py-3 text-left">Destination Point</th>
                    <th class="px-6 py-3 text-left">Arrival Time</th>
                    <th class="px-6 py-3 text-left">Destination Time</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left"></th>
                    <th class="px-6 py-3 text-left">Option</th>
                </tr>
            </thead>
            <tbody id="" class="text-sm font-light text-gray-600">
                <!-- Dynamic rows will be injected here -->
            </tbody>
        </table>
    </div>

</div>









    
  
  


@endsection