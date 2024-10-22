<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- SweetAlert2 CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/css/app.css')
    <title>Your Application</title>
</head>

<body>
    <div class="relative w-screen h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('img/img2.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Dark overlay -->

        <div class="flex justify-center items-center h-screen mx-auto">

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

            <!-- Login Form -->
            <div class="flex items-center justify-center gap-10 w-full max-w-2xl transition-transform transform duration-300 ease-in-out hover:shadow-xl fade-in"
                aria-hidden="false">
                <div class="flex flex-col w-full bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-center text-gray-700">Password Reset Form</h2>
                    <form action="{{ route('reset_password') }}" method="POST" class="flex flex-col w-full mt-5">
                        @csrf
                        <input type="hidden" value="{{ $email }}" name="email"
                            class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">

                        <input type="password" name="password" placeholder="Password"
                            class="border border-gray-300 rounded-lg p-3 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="password" name="password_confirmation" placeholder="Confirm Password"
                            class="border border-gray-300 rounded-lg p-3 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <button
                            class="bg-blue-600 text-white rounded-lg p-3 hover:bg-blue-700 transition duration-200">Password
                            Reset</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
