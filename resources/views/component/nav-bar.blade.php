<nav class="w-full border mb-10">
    <div class="flex justify-between m-5 ">
        <div>
            <img src="{{ asset('img/logo.png') }}" alt="" class="w-36">
        </div>
        <div class="flex relative gap-10 justify-center h-fit items-center">
            <a href="{{ route('user_dashboard') }}" class="text-lg">Dashboard</a>
            <a href="{{ route('history') }}" class="text-lg">History</a>
            {{-- profile --}}
            <div class="relative">
                <a href="#" id="profileIcon" class="flex items-center">
                    <img src="{{ asset('icon/user (1).png') }}" alt="Profile" class="w-10 h-10">
                </a>
                {{-- profile drop down --}}
                <div id="profileDropdown" class="absolute right-0 mt-2 w-52 bg-white rounded-lg shadow-lg hidden z-10">
                    <div class="p-2 w-full">
                        <p class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-lg">{{Auth::user()->full_name}}</p>
                        <a href="{{ route('user_profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-lg">Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="px-4 py-2 text-gray-800 hover:bg-gray-200 text-lg w-full flex justify-start">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Get the profile icon and dropdown elements
            const profileIcon = document.getElementById('profileIcon');
            const profileDropdown = document.getElementById('profileDropdown');

            // Toggle the dropdown on click
            profileIcon.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default anchor behavior
                profileDropdown.classList.toggle('hidden'); // Toggle the dropdown visibility
            });

            // Optional: Hide the dropdown if clicking outside of it
            document.addEventListener('click', (event) => {
                if (!profileIcon.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden'); // Hide the dropdown
                }
            });
        </script>
    </div>
</nav>
