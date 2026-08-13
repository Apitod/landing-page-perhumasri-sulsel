<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Perhumasri Sulsel - Persatuan Hubungan Masyarakat Rumah Sakit Indonesia Provinsi Sulawesi Selatan')">
    <meta name="keywords" content="@yield('meta_keywords', 'perhumasri, sulawesi selatan, humas rumah sakit, organisasi kesehatan')">
    <meta property="og:title" content="@yield('title', 'Perhumasri Sulsel') | Perhumasri Sulawesi Selatan">
    <meta property="og:description" content="@yield('meta_description', 'Persatuan Hubungan Masyarakat Rumah Sakit Indonesia Provinsi Sulawesi Selatan')">
    <meta property="og:type" content="website">

    <title>@yield('title', 'Beranda') | Perhumasri Sulsel</title>

    {{-- Google Fonts: Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    {{-- Vite compiled assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="antialiased min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Page content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>
