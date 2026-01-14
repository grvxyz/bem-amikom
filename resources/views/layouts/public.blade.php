<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BEM AMIKOM')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

{{-- 🔥 PENTING: body jadi flex + min-h-screen --}}
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <x-public.header />

    {{-- 🔥 PENTING: main flex-grow --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    <x-public.footer />

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Anime JS --}}
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>

    {{-- INIT --}}
    <script>
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-out-cubic'
        });
    </script>

    {{-- Script dari halaman --}}
    @stack('scripts')

</body>
</html>
