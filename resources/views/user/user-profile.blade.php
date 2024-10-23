@extends('layout.user-layout')
<!-- Extend the layout -->

@section('user-content')
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

    <body class="font-sans bg-gray-100">
        <div class="flex items-center justify-center w-full">
            <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
                <div class="flex justify-center mb-6">
                    <div class="flex items-center justify-center bg-gray-200 rounded-full w-36 h-36">
                        <img src="./img/user.png" alt="Profile Avatar" class="rounded-full w-28 h-28" />
                    </div>
                </div>
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Profile Information</h2>
                <form class="mt-4" method="POST" action="{{ route('change_details') }}"> <!-- Update action as needed -->
                    @csrf
                    <div class="mb-4">
                        <label for="newFullName" class="block mb-2 text-sm font-semibold text-gray-700">Full Name:</label>
                        <input type="text" id="newFullName" name="userFullName" value="{{ $user->full_name ?? '' }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your full name" required />
                    </div>

                    <div class="mb-4">
                        <label for="newEmail" class="block mb-2 text-sm font-semibold text-gray-700">Email:</label>
                        <input type="email" id="newEmail" name="userEmail" value="{{ $user->email ?? '' }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your email" required />
                    </div>

                    <div class="mb-4">
                        <label for="newContact" class="block mb-2 text-sm font-semibold text-gray-700">Contact:</label>
                        <input type="text" id="newContact" name="userContact" value="{{ $user->contact ?? '' }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your contact number" required />
                    </div>

                    <div class="mb-4">
                        <label for="newNic" class="block mb-2 text-sm font-semibold text-gray-700">NIC:</label>
                        <input type="text" id="newNic" name="userNic" value="{{ $user->nic ?? '' }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your NIC" required />
                    </div>

                    <div class="mb-4">
                        <label for="newBday" class="block mb-2 text-sm font-semibold text-gray-700">Date of Birth:</label>
                        <input type="date" id="newBday" name="userBday" value="{{ $user->dob ?? '' }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required />
                    </div>

                    <div class="mb-4">
                        <label for="newAddress" class="block mb-2 text-sm font-semibold text-gray-700">Address:</label>
                        <input type="text" id="newAddress" name="userAddress" value="{{ $user->address ?? '' }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your address" required />
                    </div>

                    <div class="flex justify-between mt-6">
                        <button type="submit"
                            class="px-6 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
                        <!-- Change Password Button -->
                        <button id="changePasswordBtn" type="button"
                            class="px-6 py-2 text-blue-600 transition border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="changePasswordModal"
            class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-75 backdrop-blur-sm">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4 p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Change Password</h2>
                <form action="{{ route('change_password') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="oldPassword" class="block text-sm font-medium text-gray-700">Old Password</label>
                        <input type="password" id="oldPassword" name="oldPassword" required
                            class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your old password" />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" id="password" name="password" required
                            class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your new password" />
                    </div>
                    <div class="mb-5">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Confirm your new password" />
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition-all duration-200">
                            Change Password
                        </button>
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-200">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </body>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const changePasswordBtn = document.getElementById('changePasswordBtn');
            const changePasswordModal = document.getElementById('changePasswordModal');
            const cancelBtn = document.getElementById('cancelBtn');

            // Open the modal when the button is clicked
            changePasswordBtn.addEventListener('click', () => {
                changePasswordModal.classList.remove('hidden');
            });

            // Close the modal when the cancel button is clicked
            cancelBtn.addEventListener('click', () => {
                changePasswordModal.classList.add('hidden');
            });

        });
    </script>
@endsection
