<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SmartFarming</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div
        class="min-h-screen flex items-center justify-center px-4 bg-cover bg-center relative"
        style="background-image: url('/img/alifa&kangkung.jpg');">

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

        <!-- Login Card -->
        <div class="relative w-full max-w-md bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-white/30">

            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center shadow-inner text-5xl">
                    🌱
                </div>

                <h1 class="text-4xl font-bold text-green-700">
                    SmartFarming
                </h1>

                <p class="text-gray-600 mt-2 text-sm">
                    Sistem Monitoring Pertanian Modern
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
            <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded-xl p-3">
                {{ session('status') }}
            </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-green-800">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="masukkan email..."
                        class="w-full rounded-xl border border-green-200 bg-white/70 px-4 py-3 focus:border-green-500 focus:ring-2 focus:ring-green-400 outline-none transition">

                    @error('email')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label
                        for="password"
                        class="block mb-2 text-sm font-medium text-green-800">
                        Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="masukkan password..."
                        class="w-full rounded-xl border border-green-200 bg-white/70 px-4 py-3 focus:border-green-500 focus:ring-2 focus:ring-green-400 outline-none transition">

                    @error('password')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm">

                    <label class="flex items-center gap-2 text-gray-700">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-green-700 hover:text-green-900 hover:underline">
                        Lupa password?
                    </a>
                    @endif
                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300">
                    Login ke SmartFarming
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 text-center text-xs text-gray-500">
                © {{ date('Y') }} SmartFarming — Pertanian Cerdas Masa Kini
            </div>

        </div>
    </div>

</body>

</html>