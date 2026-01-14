@extends('layouts.public')

@section('title', $berita->judul)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    {{-- Judul --}}
    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        {{ $berita->judul }}
    </h1>

    {{-- Meta --}}
    <p class="text-sm text-gray-500 mb-6">
        Dipublikasikan {{ $berita->created_at->format('d M Y') }}
        • oleh {{ $berita->user->name }}
    </p>

    {{-- Gambar --}}
    @if ($berita->foto)
        <div class="mb-6">
            <img 
                src="{{ asset('storage/' . $berita->foto) }}"
                alt="{{ $berita->judul }}"
                class="w-full rounded-lg shadow"
            >
        </div>
    @endif

    {{-- Isi Berita --}}
    <article class="prose max-w-none text-gray-700">
        {!! nl2br(e($berita->isi)) !!}
    </article>

    {{-- Tombol Kembali --}}
    <div class="mt-10">
        <a href="{{ route('berita.index') }}"
           class="inline-block text-blue-600 hover:underline">
            ← Kembali ke Daftar Berita
        </a>
    </div>

</div>
@endsection
