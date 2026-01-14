<header class="bg-[#6e1423] text-white sticky top-0 z-50 shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        {{-- LOGO / TITLE --}}
        <h1 class="font-bold text-lg tracking-wide">
            BEM AMIKOM
        </h1>

        {{-- DESKTOP MENU --}}
        <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
            <a href="/" class="hover:underline">Beranda</a>
            <a href="#profile" class="hover:underline">Profil</a>
            <a href="/berita" class="hover:underline">Berita</a>
            <a href="#aspirasi" class="hover:underline">Aspirasi</a>
            <a href="/login"
               class="bg-white text-[#6e1423] px-4 py-1.5 rounded font-semibold hover:bg-gray-100 transition">
                Admin
            </a>
        </nav>

        {{-- MOBILE BUTTON --}}
        <button id="menuBtn" class="md:hidden focus:outline-none">
            ☰
        </button>
    </div>

    {{-- MOBILE MENU --}}
    <div id="mobileMenu" class="hidden md:hidden bg-[#6e1423] border-t border-white/20">
        <nav class="flex flex-col px-6 py-4 gap-4 text-sm">
            <a href="/" class="hover:underline">Beranda</a>
            <a href="#profile" class="hover:underline">Profil</a>
            <a href="#berita" class="hover:underline">Berita</a>
            <a href="#aspirasi" class="hover:underline">Aspirasi</a>
            <a href="/login"
               class="bg-white text-[#6e1423] px-4 py-2 rounded text-center font-semibold">
                Admin
            </a>
        </nav>
    </div>
</header>

{{-- TOGGLE SCRIPT --}}
<script>
    document.getElementById('menuBtn').addEventListener('click', function () {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
