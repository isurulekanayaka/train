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
    <style>
        /* Animation styles */
        .fade-in {
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .fade-in.show {
            opacity: 1;
        }

        .fade-out {
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .fade-out.hide {
            opacity: 0;
        }
    </style>
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
            <div id="loginForm"
                class="flex items-center justify-center gap-10 w-full max-w-2xl transition-transform transform duration-300 ease-in-out hover:shadow-xl fade-in hide"
                aria-hidden="false">
                <div class="flex flex-col w-full bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-center text-gray-700">Login Form</h2>
                    <div class="flex justify-center mt-1">
                        <span>Don't have an account yet?
                            <button id="registerBtn" class="text-blue-500 rounded-lg transition duration-200 mb-6">Sign
                                up here</button>
                        </span>
                    </div>

                    <input type="text" placeholder="Username"
                        class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">

                    <input type="password" placeholder="Password"
                        class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">

                    <!-- Forgot Password link -->
                    <div class="flex justify-end mb-6">
                        <a href="#" class="text-blue-500 hover:underline transition duration-150">Forgot
                            Password?</a>
                    </div>

                    <button
                        class="bg-blue-600 text-white rounded-lg p-3 hover:bg-blue-700 transition duration-200">Login</button>

                    <div class="flex justify-center">
                        <a href="{{ route('index') }}"
                            class="rounded-lg transition duration-200 text-blue-500 mt-2">Back to Home</a>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div id="registerForm"
                class="flex items-center justify-center gap-10 w-full max-w-2xl transition-transform transform duration-300 ease-in-out hover:shadow-xl fade-out hide"
                aria-hidden="true">
                <div class="flex flex-col w-full p-8 bg-white rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-center text-gray-700">Register Form</h2>
                    <div class="flex justify-center mt-1">
                        <span>Already have an account?
                            <button id="loginBtn" class="text-blue-500 rounded-lg transition duration-200 mb-6">Log in
                                here</button>
                        </span>
                    </div>
                    <form action="{{ route('register') }}" method="POST" class="flex flex-col w-full">
                        @csrf
                        <input type="text" name="full_name" placeholder="Full Name"
                            class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="email" name="email" placeholder="Email"
                            class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="text" name="contact" placeholder="Contact"
                            class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="text" name="nic" placeholder="NIC"
                            class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="text" name="address" placeholder="Address"
                            class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="date" name="dob" placeholder="Birthday"
                            class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="password" name="password" placeholder="Password"
                            class="border border-gray-300 rounded-lg p-3 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <input type="password" name="password_confirmation" placeholder="Confirm Password"
                            class="border border-gray-300 rounded-lg p-3 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                            required>

                        <button
                            class="bg-green-600 text-white rounded-lg p-3 hover:bg-green-700 transition duration-200">Register</button>
                    </form>
                    <div class="flex justify-center">
                        <a href="{{ route('index') }}"
                            class="rounded-lg transition duration-200 text-blue-500 mt-2">Back to Home</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        const registerBtn = document.getElementById('registerBtn');
        const loginBtn = document.getElementById('loginBtn');
        const registerForm = document.getElementById('registerForm');
        const loginForm = document.getElementById('loginForm');

        // Function to switch forms with animation
        function switchForms(showForm, hideForm) {
            hideForm.classList.remove('show');
            hideForm.classList.add('fade-out');

            // Wait for the fade-out animation to complete before showing the next form
            setTimeout(() => {
                hideForm.classList.add('hidden'); // Hide the form completely
                hideForm.classList.remove('fade-out');
                hideForm.setAttribute('aria-hidden', 'true');

                showForm.classList.remove('hidden');
                showForm.classList.add('fade-in');
                showForm.setAttribute('aria-hidden', 'false');

                setTimeout(() => {
                    showForm.classList.add('show');
                }, 10);
            }, 500); // Match this duration to the fade-out duration
        }

        // Show registration form and hide login form
        registerBtn.addEventListener('click', () => {
            switchForms(registerForm, loginForm);
        });

        // Show login form and hide registration form
        loginBtn.addEventListener('click', () => {
            switchForms(loginForm, registerForm);
        });

        window.onload = function() {
            switchForms(loginForm, registerForm); // Ensure the login form is shown initially
        };
    </script>
</body>

</html>
