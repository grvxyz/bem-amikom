@extends('layouts.public')

@section('title', 'Berita Acara')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold">Berita Acara</h1>
        <p class="text-gray-500">Informasi kegiatan terbaru</p>
    </div>

    <!-- SEARCH -->
    <div class="max-w-md mx-auto mb-8">
        <input type="text"
               id="search"
               placeholder="Cari berita..."
               class="w-full px-4 py-2 border rounded-lg focus:ring">
    </div>

    <!-- LIST -->
    <div id="berita-container">
        @include('public.berita._list', ['berita' => $berita])
    </div>

</div>

<script>
const searchInput = document.getElementById('search');
const container = document.getElementById('berita-container');

let debounce = null;

searchInput.addEventListener('keyup', function () {
    clearTimeout(debounce);

    debounce = setTimeout(() => {
        fetch(`{{ route('berita.search') }}?q=${this.value}`)
            .then(res => res.text())
            .then(html => container.innerHTML = html);
    }, 400);
});
</script>
@endsection
