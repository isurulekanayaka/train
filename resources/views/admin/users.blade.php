@extends('layout.admin-layout')

@section('admin-content')



<div class="w-full p-6 bg-white rounded-lg shadow-md">
    <section class="mb-4">
        <h1 class="mb-4 text-2xl font-semibold">User Details</h1>
        
        <div class="flex justify-center mb-4">
            <div class="relative w-full max-w-md"> <!-- Adjust max-w-md to your desired width -->
                <input type="search" placeholder="Search Data..." class="w-full px-4 py-2 pr-10 transition duration-200 ease-in-out border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                <img src="assets/img/search.png" alt="" class="absolute w-5 h-5 text-gray-500 right-2 top-2" />
            </div>
        </div>
        
        
    </section>
    
    <section>
        <table class="min-w-full overflow-hidden bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border-b">Sr. No.<span class="icon-arrow">&UpArrow;</span></th>
                    <th class="px-4 py-2 border-b">Name<span class="icon-arrow">&UpArrow;</span></th>
                    <th class="px-4 py-2 border-b">Phone No<span class="icon-arrow">&UpArrow;</span></th>
                    <th class="px-4 py-2 border-b">Email<span class="icon-arrow">&UpArrow;</span></th>
                    <th class="px-4 py-2 border-b">Username<span class="icon-arrow">&UpArrow;</span></th>
                    <th class="px-4 py-2 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example User Row -->
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border-b">1</td>
                    <td class="px-4 py-2 border-b">John Doe</td>
                    <td class="px-4 py-2 border-b">123-456-7890</td>
                    <td class="px-4 py-2 border-b">johndoe@example.com</td>
                    <td class="px-4 py-2 border-b">johndoe</td>
                    <td class="px-4 py-2 border-b">
                        <a class="px-3 py-1 mb-3 text-white bg-blue-500 rounded-md btn btn-primary" href="#">Update</a>
                        <a class="px-3 py-1 mb-3 text-white bg-red-500 rounded-md btn btn-primary" href="#">Delete</a>
                    </td>
                </tr>
                <!-- Repeat similar rows for more users -->
            </tbody>
        </table>
    </section>

</div>
   




@endsection 