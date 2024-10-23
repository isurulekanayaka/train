<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/checkout.js"></script>

    @vite('resources/css/app.css')
    <title>Your Application</title> <!-- Add a title for better SEO -->
</head>

<body>
    @include('component.nav-bar') <!-- Include your navigation bar -->
    
    <div class="flex m-10">
        @yield('user-content') <!-- This will be replaced by content from child views -->
    </div>
</body>

</html>
