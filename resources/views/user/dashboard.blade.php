@extends('layout.user-layout') <!-- Extend the layout -->

@section('user-content')
    <div>
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <p class="mt-4">Welcome to your dashboard!</p>
        <!-- Add more dashboard content here -->
        <div class="grid grid-cols-2 gap-4">
            <div class="p-4 bg-gray-200 rounded-lg">Item 1</div>
            <div class="p-4 bg-gray-200 rounded-lg">Item 2</div>
            <div class="p-4 bg-gray-200 rounded-lg">Item 3</div>
            <div class="p-4 bg-gray-200 rounded-lg">Item 4</div>
        </div>
    </div>
@endsection
