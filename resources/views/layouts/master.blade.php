@include('layouts.__header')

<body>
    <!-- Navbar -->
    @include('layouts.__navbar')
    <!-- Navbar End -->

    <!-- Content -->
    @yield('content')
    <!-- Content End -->
</body>
@include('layouts.__footer')