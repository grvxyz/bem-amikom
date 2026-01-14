<header class="bg-white shadow px-6 py-4 flex justify-between items-center">

    <h1 class="text-lg font-semibold text-gray-700">
        @yield('page-title', 'Dashboard')
    </h1>

    <div class="flex items-center gap-3">
        {{-- Nama User Login --}}
        <span class="text-sm text-gray-600">
            {{ auth()->user()->name }}
        </span>

        {{-- Avatar Inisial --}}
        <div class="w-8 h-8 rounded-full bg-[#D39D55] text-white flex items-center justify-center font-semibold">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                type="submit"
                class="text-sm text-red-500 hover:text-red-700 ml-2"
            >
                Logout
            </button>
        </form>
    </div>

</header>
