@extends('layout.user-layout') <!-- Extend the layout -->

@section('user-content')

{{-- <div class="flex flex-col items-center w-full">
</div> --}}


<div class="w-full py-10 bg-gray-50">
    <div class="max-w-6xl px-4 mx-auto space-y-10 sm:px-6 lg:px-8">

        <div class="text-center">
            <h1 class="mb-4 text-4xl font-bold text-gray-900">About Us</h1>
            <p class="max-w-2xl mx-auto text-lg leading-relaxed text-gray-700">
                We are committed to offering a smooth and enjoyable experience for train travelers, making it simple to purchase tickets and reserve seats. Our goal is to ensure comfort and reliability for every passenger.
            </p>
        </div>

        <!-- Feedback Section -->
        <div class="grid items-center grid-cols-1 gap-10 md:grid-cols-2">
            <!-- Feedback Form (Left) -->
            <section id="feedback" class="max-w-2xl p-8 mx-auto bg-white border border-gray-200 rounded-lg shadow-lg">
                <h2 class="mb-6 text-2xl font-semibold text-center text-gray-900">We Value Your Feedback</h2>
                <p class="mb-4 text-base text-center text-gray-600">
                    Your insights help us improve and provide you with a better experience. Please share your thoughts with us!
                </p>
                <form id="feedbackForm" method="post" class="space-y-6">
                    <div class="form-group">
                        <label for="reviewer_name" class="block text-sm font-medium text-gray-700">Your Name:</label>
                        <input type="text" id="reviewer_name" name="reviewer_name" class="w-full p-3 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                    </div>
                    <div class="form-group">
                        <label for="review_text" class="block text-sm font-medium text-gray-700">Your Review:</label>
                        <textarea id="review_text" name="review_text" rows="4" class="w-full p-3 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="w-full px-6 py-3 font-semibold text-white transition duration-300 bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Submit Review</button>
                    </div>
                </form>
            </section>

            <!-- Feedback Image (Right) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
                <h3 class="mb-2 text-lg font-medium text-center text-gray-900">About Our Train Online System</h3>
                <p class="text-center text-gray-600">
                    Our online train system is designed to make traveling by train as convenient and enjoyable as possible. With user-friendly features, you can easily search for routes, check schedules, and purchase tickets from the comfort of your home. Our platform ensures real-time updates and secure transactions, providing a seamless experience for all train travelers.
                </p>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="grid items-center grid-cols-1 gap-10 md:grid-cols-2">
            <!-- Contact Image and Text (Left) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
                <h2 class="mt-4 text-xl font-semibold">Emergency Contacts & Inquiries</h2>
                <p class="mt-2 text-base text-gray-700">
                    For urgent assistance or inquiries, please reach out to our dedicated emergency contact team. We are available 24/7 to address your concerns and provide immediate support. Your safety and satisfaction are our top priorities.
                </p>
                <img src="{{ asset('img/train3.jpg') }}" alt="Contact Illustration" class="w-full h-auto mt-4 rounded-lg shadow-md" />
            </div>

            <!-- Contact Form (Right) -->
            <section id="contact" class="w-full max-w-2xl p-8 mx-auto bg-white border border-gray-200 rounded-lg shadow-lg">
                <h2 class="mb-6 text-2xl font-semibold text-center text-gray-900">Contact Us</h2>
                <form id="contactForm" method="post" class="space-y-6">
                    <div class="form-group">
                        <label for="first_name" class="block mb-1 text-sm font-medium text-gray-700">Full Name:</label>
                        <input type="text" id="first_name" name="first_name" class="w-full p-3 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" id="email" name="email" class="w-full p-3 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="block mb-1 text-sm font-medium text-gray-700">Mobile Number:</label>
                        <input type="tel" id="mobile" name="mobile" class="w-full p-3 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="block mb-1 text-sm font-medium text-gray-700">Message:</label>
                        <textarea id="message" name="message" rows="4" class="w-full p-3 transition duration-300 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 font-semibold text-white transition duration-300 bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Send</button>
                </form>
            </section>
        </div>

    </div>
</div>


@endsection
