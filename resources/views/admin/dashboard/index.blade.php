@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')

<div class="space-y-8">

    {{-- WELCOME --}}
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-700 text-sm">
            Selamat datang,
            <span class="font-semibold text-[#6e1423]">
                {{ auth()->user()->name }}
            </span>
        </p>
    </div>

    {{-- FILTER PERIODE --}}
    <div class="bg-white p-6 rounded shadow">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Dari</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}"
                    class="border rounded px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Sampai</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}"
                    class="border rounded px-3 py-2 text-sm">
            </div>
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded text-sm">
                Filter
            </button>
        </form>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-500 text-sm">Berita Acara Publish</p>
            <h2 class="text-3xl font-bold text-indigo-600 mt-2">
                {{ $totalBerita }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-500 text-sm">Aspirasi Masuk</p>
            <h2 class="text-3xl font-bold text-green-600 mt-2">
                {{ $totalAspirasi }}
            </h2>
        </div>
    </div>

    {{-- ASPIRASI TERBARU --}}
    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg mb-4">5 Aspirasi Terbaru</h3>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="py-2">Nama</th>
                        <th>Aspirasi</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestAspirasi as $aspirasi)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2">{{ $aspirasi->nama_pengirim }}</td>
                            <td>
                                {{ \Illuminate\Support\Str::limit($aspirasi->isi_aspirasi, 50) }}
                            </td>
                            <td class="text-gray-500">
                                {{ $aspirasi->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-6">
                                Belum ada aspirasi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- EVENT AKTIF --}}
    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-semibold text-lg mb-4">Event Sedang Aktif</h3>

        @if ($activeEvents->count())
            <ul class="space-y-4">
                @foreach ($activeEvents as $event)
                    <li class="border rounded p-4 hover:bg-gray-50">
                        <h4 class="font-semibold">
                            {{ $event->nama_event }}
                        </h4>
                        <p class="text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                            s/d
                            {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}
                        </p>
                        <p class="text-sm mt-2">
                            {{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}
                        </p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 text-sm">
                Tidak ada event aktif
            </p>
        @endif
    </div>

</div>

@endsection
