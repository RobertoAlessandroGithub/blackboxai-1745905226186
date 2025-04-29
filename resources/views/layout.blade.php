<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Mie Gacoan Self Service')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-red-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-2xl font-bold">Mie Gacoan Self Service</h1>
            <i class="fas fa-utensils text-2xl"></i>
        </div>
    </header>

    <main class="flex-grow container mx-auto p-4">
        @yield('content')
    </main>

    <footer class="bg-red-600 text-white p-4 text-center">
        &copy; {{ date('Y') }} Mie Gacoan Self Service. All rights reserved.
    </footer>
</body>
</html>
