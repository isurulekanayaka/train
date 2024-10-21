<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="overflow-hidden">
    <div class="relative w-screen h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('img/trian2.jpg') }}');">
        <!-- Layer to darken the background image -->
        <div class="absolute inset-0 bg-black opacity-25"></div>

        <!-- Content above the background -->
        <div class="relative flex justify-between">
            <div>
                <img src="{{ asset('img/logo.png') }}" alt="" class="w-36 m-5">
            </div>
            <div class="flex mx-5">
                <div>
                    <p class="text-lg m-5 group relative w-max h-8">
                        <a href="#"
                            class="group-hover:text-white text-white text-2xl font-mono font-semibold">Login</a>
                        <span
                            class="absolute left-0 bottom-0 w-0 group-hover:w-full transition-all duration-300 h-0.5 bg-white"></span>
                    </p>
                </div>
                <div>
                    <p class="text-lg m-5 group relative w-max h-8">
                        <a href="#"
                            class="group-hover:text-white text-white text-2xl font-mono font-semibold">About Us</a>
                        <span
                            class="absolute left-0 bottom-0 w-0 group-hover:w-full transition-all duration-300 h-0.5 bg-white"></span>
                    </p>
                </div>
            </div>
        </div>

        <div class="relative flex flex-col justify-center items-center h-full">
            <h1 class="mb-10 text-6xl font-sans text-white font-bold">
                Railway Adventure Awaits,
                <span class="word  animate-fade text-yellow-500 font-bold">Reserve Now</span>
                <span class="word hidden animate-fade text-yellow-500 font-bold">Book Today</span>
                <span class="word hidden animate-fade text-yellow-500 font-bold">Start Exploring</span>
                <span class="word hidden animate-fade text-yellow-500 font-bold">Plan Your Journey</span>
                <span class="word hidden animate-fade text-yellow-500 font-bold">Secure Your Seat</span>
            </h1>
            <h1 class="mb-20 text-4xl font-sans text-white"> Travel by Rails is a platform that allows you to book train
                travels
                with ease and comfort.</h1>
            <script>
                // Select all span elements with the class 'word'
                const words = document.querySelectorAll('.word');
                let index = 0;

                // Function to show words one by one in a loop with animation
                function showWords() {
                    words.forEach(word => word.classList.add('hidden')); // Hide all words
                    words[index].classList.remove('hidden'); // Show current word
                    words[index].classList.add('animate-fade'); // Add fade animation
                    index = (index + 1) % words.length; // Move to the next word and loop
                }

                // Start the loop
                setInterval(showWords, 2000); // Change every 2 seconds (2000ms)

                // Function to set the input date to today
                function setTodayDate() {
                    const dateInput = document.getElementById('dateInput');
                    const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
                    dateInput.value = today; // Set the value of the date input
                }

                // Call the function on page load
                window.onload = setTodayDate;
            </script>

            <div class="bg-white rounded-lg p-6 flex gap-5 w-4/5 opacity-90">
                <section class="w-1/4">
                    <select class="w-full h-10 rounded-lg border">
                        <option value="">test 1</option>
                        <option value="">test 2</option>
                        <option value="">test 3</option>
                    </select>
                </section>
                <section class="w-1/4">
                    <select class="w-full h-10 rounded-lg border">
                        <option value="">test 1</option>
                        <option value="">test 2</option>
                        <option value="">test 3</option>
                    </select>
                </section>
                <input type="date" id="dateInput" class="border h-10 rounded-lg w-1/4">
                <button class="bg-blue-500 text-white rounded w-1/4 hover:bg-blue-700">Search</button>
            </div>
        </div>
    </div>
</body>

</html>
