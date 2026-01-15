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

    {{-- ✅ Leaflet CSS --}}
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    />
</head>

{{-- 🔥 body flex --}}
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <x-public.header />

    {{-- 🔥 main grow --}}
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

    {{-- ✅ Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- INIT --}}
    <script>
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-out-cubic'
        });

        // ===== LEAFLET MAP (FOOTER) =====
        document.addEventListener("DOMContentLoaded", function () {
            const mapEl = document.getElementById("map");
            if (!mapEl) return;

            const map = L.map("map", {
                zoomControl: false,
                attributionControl: false
            }).setView([-7.7596, 110.4088], 15);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

            L.marker([-7.7596, 110.4088])
                .addTo(map)
                .bindPopup(
                    "<strong>Universitas AMIKOM Yogyakarta</strong><br>BEM AMIKOM"
                );
        });
    </script>

    {{-- Script dari halaman --}}
    @stack('scripts')

</body>
</html>
