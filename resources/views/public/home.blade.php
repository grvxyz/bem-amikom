@extends('layouts.public')

@section('title', 'BEM AMIKOM')

@section('content')

{{-- ================= HERO / EVENT SLIDER ================= --}}
<section class="relative bg-gray-100 overflow-hidden">

    @if ($events->count())
        <div class="relative h-[420px]">
            @foreach ($events as $index => $event)
                <div class="absolute inset-0 transition-opacity duration-700
                    {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                    data-slide="{{ $index }}">

                    <img src="{{ asset('storage/'.$event->poster) }}"
                         class="w-full h-full object-cover"
                         alt="{{ $event->nama_event }}">

                    <div class="absolute inset-0 bg-black/50"></div>

                    <div class="absolute inset-0 flex items-center">
                        <div class="max-w-4xl mx-auto px-6 text-white">
                            <h2 class="text-3xl md:text-4xl font-bold mb-3">
                                {{ $event->nama_event }}
                            </h2>
                            <p class="text-sm mb-2">
                                {{ $event->tanggal_mulai }} – {{ $event->tanggal_selesai }}
                            </p>
                            <p class="max-w-xl text-sm">
                                {{ Str::limit($event->deskripsi, 120) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="h-[300px] flex items-center justify-center bg-gray-200">
            <p class="text-gray-500">Belum ada event aktif</p>
        </div>
    @endif
</section>

{{-- ================= BERITA ================= --}}
{{-- ================= BERITA ================= --}}
<section id="berita" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-[#6e1423]">
                Berita Terbaru
            </h2>

        </div>

        {{-- HORIZONTAL SCROLL --}}
        <div class="relative">
            <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">

                @forelse ($berita as $item)
                    <div class="min-w-[280px] max-w-[280px] bg-white border rounded-xl shadow-sm hover:shadow-md transition overflow-hidden">

                        {{-- FOTO --}}
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="w-full h-40 object-cover"
                                 alt="{{ $item->judul }}">
                        @else
                            <div class="h-40 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                                Tidak ada gambar
                            </div>
                        @endif

                        {{-- KONTEN --}}
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2">
                                {{ $item->judul }}
                            </h3>

                            <p class="text-xs text-gray-500 mb-2">
                                {{ $item->created_at->format('d M Y') }}
                            </p>

                            <p class="text-sm text-gray-600 line-clamp-3 mb-3">
                                {{ Str::limit(strip_tags($item->isi), 90) }}
                            </p>

                            <a href="{{ route('berita.detail', $item->slug) }}"
                               class="text-sm text-blue-600 hover:underline">
                                Baca →
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada berita</p>
                @endforelse

            </div>
        </div>
        <a href="{{ route('berita.index') }}"
               class="text-sm text-[#6e1423] hover:underline font-medium">
                Lihat Selengkapnya →
            </a>

    </div>
</section>


{{-- ================= ASPIRASI ================= --}}
<section id="aspirasi" class="py-16 bg-gray-100">
    <div class="max-w-xl mx-auto px-6">

        <h2 class="text-2xl font-bold mb-6 text-[#6e1423] text-center">
            Sampaikan Aspirasi
        </h2>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('aspirasi.public.store') }}"
              class="bg-white p-6 rounded shadow space-y-4">
            @csrf

            <div>
                <label class="text-sm">Nama</label>
                <input type="text" name="nama_pengirim"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div>
                <label class="text-sm">Email</label>
                <input type="email" name="email"
                       placeholder="nama@students.amikom.ac.id"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            <div>
                <label class="text-sm">Aspirasi</label>
                <textarea name="isi_aspirasi"
                          rows="4"
                          class="w-full border rounded px-3 py-2"
                          required></textarea>
            </div>

            <button class="w-full bg-[#6e1423] text-white py-2 rounded hover:opacity-90">
                Kirim Aspirasi
            </button>
        </form>

    </div>
</section>

{{-- ================= SLIDER SCRIPT ================= --}}
@if ($events->count())
<script>
    const slides = document.querySelectorAll('[data-slide]');
    let current = 0;

    setInterval(() => {
        slides[current].classList.replace('opacity-100', 'opacity-0');
        current = (current + 1) % slides.length;
        slides[current].classList.replace('opacity-0', 'opacity-100');
    }, 5000);
</script>
@endif

@endsection
