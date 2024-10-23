<nav class="w-full mb-10 border">
    <div class="flex justify-between m-5 ">
        <div>
            <img src="{{ asset('img/logo.png') }}" alt="" class="w-36">
        </div>
        <div class="relative flex items-center justify-center gap-10 h-fit">
            <a href="{{ route('admin_dashboard') }}" class="text-lg">Dashboard</a>

            <div class="relative">
                 <a href="#" id="trainButton"
                 class="flex items-center px-4 py-2 text-lg">
                 Trains
             </a>
             <!-- Dropdown Menu -->
             <div id="trainDropdown" class="absolute right-0 z-10 hidden mt-2 bg-white rounded-lg shadow-lg w-52">
                 <div class="w-full p-2">
                     <a href="{{ route('add_train') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Add Trains</a>
                     <a href="{{ route('train_delay') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Delay Trains</a>
                     <a href="{{ route('train_cancel') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cancel Trains</a>
                 </div>
             </div>
            </div>

                <a href="" class="text-lg">Reservations</a>
                <a href="{{ route('all_users') }}" class="text-lg">Users</a>

                {{-- profile --}}
                <div class="relative">
                    <a href="#" id="profileIcon" class="flex items-center">
                        <img src="{{ asset('icon/user (1).png') }}" alt="Profile" class="w-10 h-10">
                    </a>
                    {{-- profile drop down --}}
                    <div id="profileDropdown"
                        class="absolute right-0 z-10 hidden mt-2 bg-white rounded-lg shadow-lg w-52">
                        <div class="w-full p-2">
                            <p class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200">{{Auth::user()->full_name}}</p>
                            <a href="{{ route('admin_profile') }}" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200">Profile</a>
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

            <!-- JavaScript for Dropdown -->
            <script>
                const trainButton = document.getElementById('trainButton');
                const trainDropdown = document.getElementById('trainDropdown');

                // Toggle dropdown visibility on click
                trainButton.addEventListener('click', (event) => {
                    event.preventDefault(); // Prevent the anchor's default behavior
                    trainDropdown.classList.toggle('hidden'); // Toggle the hidden class
                });

                // Close dropdown if clicking outside of it
                document.addEventListener('click', function(event) {
                    if (!trainButton.contains(event.target) && !trainDropdown.contains(event.target)) {
                        trainDropdown.classList.add('hidden'); // Close the dropdown
                    }
                });
            </script>


        </div>
</nav>