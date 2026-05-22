@extends('layouts.master')
@section('content')
<!-- content -->
<!-- hero -->
<div class="relative w-full h-screen bg-center">
    <!-- Image -->
    <div
        class="bg-cover h-screen"
        style="background-image: url('{{ asset('img/alifa&kangkung.jpg') }}')">
    </div>
    <!-- <img src="/img/alifa&kangkung.jpg" class="" /> -->

    <!-- Overlay (optional biar gelap) -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Text -->
    <div
        class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
        <h1 class="text-5xl font-bold drop-shadow-lg">Smart Farming</h1>

        <div class="mt-6 flex gap-4">
            <button class="bg-yellow-600 text-white px-6 py-2 rounded-full">
                <a href=""> Open App</a>
            </button>
            <button class="bg-white text-yellow-700 px-6 py-2 rounded-full">
                Discover More
            </button>
        </div>
    </div>
</div>
<!-- hero end -->
@endsection