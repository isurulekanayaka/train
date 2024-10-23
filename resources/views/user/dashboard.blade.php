@extends('layout.user-layout') <!-- Extend the layout -->

@section('user-content')

<div class="flex flex-col items-center w-full">

    <!-- Hero Section -->
    <div class="flex flex-col items-center justify-center w-full text-center text-white border border-gray-800 h-80" style="background-color: #434343;">
        <h3 class="text-4xl font-medium font-montserrat animate-slide-in">SMART TRAVEL MADE SIMPLE</h3>
        <h1 class="mt-4 overflow-hidden text-2xl text-white animate-fade-in">Effortlessly explore new destinations with our quick, real-time e-ticketing system.</h1>
    </div>
    
    <style>
      /* Slide-in animation */
      @keyframes slideIn {
        from { opacity: 0; transform: translateX(-100px); }
        to { opacity: 1; transform: translateX(0); }
      }
    
      /* Fade-in animation */
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }
    
      /* Apply animations with staggered delays */
      .animate-slide-in {
        animation: slideIn 1.5s ease-out forwards;
        animation-delay: 0s; /* First animation */
      }
    
      .animate-fade-in {
        animation: fadeIn 1.5s ease-in forwards;
        animation-delay: 1.5s; /* Second animation with delay */
      }
    
      /* Ensure the elements are hidden initially */
      .animate-slide-in, .animate-fade-in {
        opacity: 0;
      }
    </style>
    
    

    <!-- Search Section -->
    {{-- <div class="absolute flex items-center w-4/5 gap-4 mt-10 transition-shadow duration-300 transform bg-transparent rounded-lg shadow-lg opacity-90 justify-evenly" style="border: 2px solid transparent;"> --}}
        <div class="flex w-4/5 gap-4 p-8 mt-5 bg-white rounded-xl opacity-90">
            <section class="w-1/4">
                <select class="w-full border rounded-xl h-14">
                    <option value="">test 1</option>
                    <option value="">test 2</option>
                    <option value="">test 3</option>
                </select>
            </section>
            <section class="w-1/4">
                <select class="w-full border rounded-xl h-14">
                    <option value="">test 1</option>
                    <option value="">test 2</option>
                    <option value="">test 3</option>
                </select>
            </section>
            <input type="date" id="dateInput" class="w-1/4 border rounded-xl h-14">
            <button class="w-1/4 text-white bg-blue-500 rounded-xl hover:bg-blue-700">Search</button>
        </div>
        
    

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
        </table>
    </div>

</div>


 
@endsection
