@extends('layout.admin-layout')

@section('admin-content')
    <div class="w-full p-6 bg-white rounded-lg shadow-md">
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
        <section class="mb-4">
            <h1 class="mb-4 text-2xl font-semibold">User Details</h1>

            <div class="flex justify-center mb-4">
                <div class="relative w-full max-w-md"> <!-- Adjust max-w-md to your desired width -->
                    <input type="search" placeholder="Search Data..."
                        class="w-full px-4 py-2 pr-10 transition duration-200 ease-in-out border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    <img src="assets/img/search.png" alt="" class="absolute w-5 h-5 text-gray-500 right-2 top-2" />
                </div>
            </div>


        </section>

        <section>
            <table class="min-w-full overflow-hidden bg-white border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border-b">Sr. No.<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="px-4 py-2 border-b">Full Name<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="px-4 py-2 border-b">Email<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="px-4 py-2 border-b">Contact<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="px-4 py-2 border-b">NIC<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="px-4 py-2 border-b">Role<span class="icon-arrow">&UpArrow;</span></th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example User Row -->
                    @forelse ($users as $index => $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->full_name }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->contact }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->nic }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->role }}</td>
                            <td class="px-4 py-2 border-b">
                                <div class="flex space-x-4">
                                    <a href="{{ route('edit_profile', ['id'=>$user->id]) }}"
                                        class="inline-block bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">View</a>
                                    <a href="{{ route('edit_profile', ['id'=>$user->id]) }}"
                                        class="inline-block bg-yellow-600 text-white px-2 py-1 rounded hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-300">Edit</a>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="flex justify-between items-center mt-4">
                <div class="text-gray-500">
                    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
                </div>
                <div>
                    {{ $users->links('vendor.pagination.tailwind') }} <!-- Or use default pagination -->
                </div>
            </div>

        </section>

    </div>
@endsection
