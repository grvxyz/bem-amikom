@if($berita->count())
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach($berita as $item)
    <a href="{{ route('berita.detail', $item->slug) }}"
       class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden group">

        {{-- FOTO --}}
        @if($item->foto)
            <img src="{{ Storage::url($item->foto) }}"
                 alt="{{ $item->judul }}"
                 class="w-full h-48 object-cover group-hover:scale-105 transition">
        @else
            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                Tidak ada gambar
            </div>
        @endif

        {{-- CONTENT --}}
        <div class="p-4">
            <h3 class="font-semibold text-lg text-gray-800 mb-2">
                {{ $item->judul }}
            </h3>

            <p class="text-sm text-gray-500 mb-3">
                {{ $item->created_at->format('d M Y') }}
                • {{ $item->user->name ?? 'Admin' }}
            </p>

            <p class="text-sm text-gray-600">
                {{ Str::limit(strip_tags($item->isi), 100) }}
            </p>
        </div>

    </a>
    @endforeach

</div>
@else
    <p class="text-center text-gray-500">Berita tidak ditemukan.</p>
@endif
