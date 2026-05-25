<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Smart Farming</title>
</head>

<body>
    <!-- content -->
    <!-- hero -->
    <dirv class="relative w-full h-screen bg-center">
        <!-- Image -->
        <div
            class="bg-cover h-screen"
            style="background-image: url('{{ asset('img/alifa&kangkung.jpg') }}')">
        </div>

        <!-- Overlay (optional biar gelap) -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Text -->
        <div
            class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
            <h1 class="text-5xl font-bold drop-shadow-lg">Smart Farming</h1>

            <div class="mt-6 flex gap-4">
                <button class="bg-yellow-600 text-white px-6 py-2 rounded-full">
                    <a href="/login"> Open App</a>
                </button>
                <button class="bg-white text-yellow-700 px-6 py-2 rounded-full">
                    <a href="">Discover More</a>
                </button>
            </div>
        </div>
        <!-- footer -->
        <div class="absolute bottom-10 inset-x-0 text-center">
            <p class="text-sm text-white">&copy; 2023 Smart Farming. All rights reserved.</p>
        </div>
        <!-- footer end -->
    </dirv>
    <!-- hero end -->

</html>