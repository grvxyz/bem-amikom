<aside class="fixed top-0 left-0 h-screen w-64 bg-[#6e1423] text-white flex flex-col z-50">

    {{-- LOGO --}}
    <div class="p-6 text-xl font-bold border-b border-[#6e1423]">
        BEM AMIKOM
    </div>

    {{-- MENU --}}
    <nav class="flex-1 p-4 space-y-2 text-sm">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="block px-4 py-2 rounded
           {{ request()->routeIs('admin.dashboard') ? 'bg-[#D39D55] font-semibold' : 'hover:bg-blue-700' }}">
            📊 Dashboard
        </a>

        {{-- Berita Acara --}}
        <a href="{{ route('berita_acara.index') }}"
           class="block px-4 py-2 rounded
           {{ request()->routeIs('berita_acara.*') ? 'bg-[#D39D55] font-semibold' : 'hover:bg-blue-700' }}">
            📄 Berita Acara
        </a>

        {{-- Aspirasi --}}
        <a href="{{ route('aspirasi.index') }}"
           class="block px-4 py-2 rounded
           {{ request()->routeIs('aspirasi.*') ? 'bg-[#D39D55] font-semibold' : 'hover:bg-blue-700' }}">
            💬 Aspirasi
        </a>

        {{-- Event --}}
        <a href="{{ route('events.index') }}"
           class="block px-4 py-2 rounded
           {{ request()->routeIs('events.*') ? 'bg-[#D39D55] font-semibold' : 'hover:bg-blue-700' }}">
            📅 Event
        </a>

    </nav>

    {{-- FOOTER --}}
    <div class="p-4 border-t border-[#6e1423] text-xs text-white">
        © {{ date('Y') }} BEM AMIKOM
    </div>
    

</aside>
