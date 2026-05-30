<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-7xl mx-auto p-6">

        {{-- HEADER --}}
        <div class="mb-8">

            <h1 class="text-4xl font-bold text-gray-800">@yield('title')</h1>
            <div class="mb-8">

                <p class="text-gray-500 mt-2">
                    @yield('description')
                </p>
                <span class="mr-2">Selamat datang, {{ Auth::user()->name }}</span>
                <!-- tombol keluar -->

                <div class="flex flex-wrap gap-3 mt-6">