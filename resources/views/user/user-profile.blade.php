@extends('layout.user-layout')
<!-- Extend the layout -->

@section('user-content')

<body class="font-sans bg-gray-100">
    <div class="flex items-center justify-center w-full">
        <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center mb-6">
                <div class="flex items-center justify-center bg-gray-200 rounded-full w-36 h-36">
                    <img src="./img/user.png" alt="Profile Avatar" class="rounded-full w-28 h-28" />
                </div>
            </div>
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Profile Information</h2>
            <form class="mt-4" method="POST" action=""> <!-- Update action as needed -->
                @csrf <!-- Include CSRF token for form submission -->
                
                <div class="mb-4">
                    <label for="newFullName" class="block mb-2 text-sm font-semibold text-gray-700">Full Name:</label>
                    <input type="text" id="newFullName" name="userFullName" value=""
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your full name" required />
                </div>
                
                <div class="mb-4">
                    <label for="newEmail" class="block mb-2 text-sm font-semibold text-gray-700">Email:</label>
                    <input type="email" id="newEmail" name="userEmail" value=""
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your email" required />
                </div>
                
                <div class="mb-4">
                    <label for="newContact" class="block mb-2 text-sm font-semibold text-gray-700">Contact:</label>
                    <input type="text" id="newContact" name="userContact" value=""
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your contact number" required />
                </div>
                
                <div class="mb-4">
                    <label for="newNic" class="block mb-2 text-sm font-semibold text-gray-700">NIC:</label>
                    <input type="text" id="newNic" name="userNic" value=""
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your NIC" required />
                </div>
                
                <div class="mb-4">
                    <label for="newBday" class="block mb-2 text-sm font-semibold text-gray-700">Date of Birth:</label>
                    <input type="date" id="newBday" name="userBday" value=""
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required />
                </div>
                
                <div class="mb-4">
                    <label for="newAddress" class="block mb-2 text-sm font-semibold text-gray-700">Address:</label>
                    <input type="text" id="newAddress" name="userAddress" value=""
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your address" required />
                </div>

                <div class="flex justify-between mt-6">
                    <button type="submit"
                        class="px-6 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
                    <a href="pass-profile-password.php"
                        class="px-6 py-2 text-blue-600 transition border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">Change
                        Password</a>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection