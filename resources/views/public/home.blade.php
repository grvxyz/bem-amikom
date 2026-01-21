@extends('layouts.public')

@section('title', 'BEM AMIKOM')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative bg-gray-100 overflow-hidden" data-aos="fade-in">
    @if ($events->count())
        <div class="relative h-[420px]">
            @foreach ($events as $index => $event)
                <div class="absolute inset-0 transition-opacity duration-700
                    {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                    data-slide="{{ $index }}">

                    <img src="{{ asset('storage/'.$event->poster) }}"
                         class="w-full h-full object-cover">

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
    @endif
</section>

{{-- ================= TENTANG KAMI ================= --}}
<section id="profile" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div data-aos="fade-right">
            <span class="inline-block mb-3 px-4 py-1 text-sm bg-orange-100 text-orange-700 rounded-full">
                Tentang Kami
            </span>

            <h2 class="text-3xl font-bold mb-4">
                Badan Eksekutif Mahasiswa AMIKOM
            </h2>

            <p class="text-gray-600">
                BEM AMIKOM adalah wadah aspirasi, pengembangan potensi,
                dan penggerak perubahan mahasiswa Universitas AMIKOM Yogyakarta.
            </p>
        </div>

        <div data-aos="fade-left">
            <img src="{{ asset('storage/image/KBJ.jpg') }}"
                 class="rounded-xl shadow-lg">
        </div>

    </div>
</section>

{{-- ================= BERITA ================= --}}
<section id="berita" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-2xl font-bold text-[#6e1423] mb-6" data-aos="fade-right">
            Berita Terbaru
        </h2>

        <div class="flex gap-6 overflow-x-auto pb-4" data-aos="fade-up">
            @foreach ($berita as $item)
                <div class="berita-card min-w-[280px] bg-white border rounded-xl shadow overflow-hidden">
                    <img src="{{ asset('storage/'.$item->foto) }}"
                         class="h-40 w-full object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold mb-1">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-xs text-gray-500 mb-2">
                            {{ $item->created_at->format('d M Y') }}
                        </p>
                        <p class="text-sm text-gray-600 mb-3">
                            {{ Str::limit(strip_tags($item->isi), 90) }}
                        </p>
                        <a href="{{ route('berita.detail', $item->slug) }}"
                           class="text-blue-600 text-sm">
                            Baca →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6 text-right" data-aos="fade-left">
            <a href="{{ route('berita.index') }}"
               class="text-sm text-[#6e1423] font-medium hover:underline">
                Lihat Selengkapnya →
            </a>
        </div>

    </div>
</section>

{{-- ================= ASPIRASI ================= --}}
<section id="aspirasi" class="py-16 bg-white">
    <div class="max-w-2xl mx-auto px-6">

        <h2 class="text-2xl font-bold text-center text-[#6e1423] mb-2">
            Sampaikan Aspirasi
        </h2>

        <p class="text-center text-gray-600 mb-8">
            Kritik & saran Anda akan kami proses secara bertanggung jawab.
        </p>

        {{-- MESSAGE --}}
        <div id="aspirasiMessage" class="hidden mb-4 p-3 rounded text-center"></div>

        <form id="aspirasiForm" class="bg-white p-6 rounded-xl shadow space-y-4">
            @csrf

            <input name="nama_pengirim" placeholder="Nama"
                   class="w-full border px-3 py-2 rounded">

            <input name="email" placeholder="Email (@amikom.ac.id)"
                   class="w-full border px-3 py-2 rounded">

            <textarea name="isi_aspirasi" rows="4"
                      class="w-full border px-3 py-2 rounded"
                      placeholder="Tulis aspirasi..."></textarea>

            <button type="submit"
                    class="w-full bg-[#6e1423] text-white py-2 rounded">
                Kirim Aspirasi
            </button>
        </form>

    </div>
</section>

@endsection

{{-- ================= SCRIPT ================= --}}
@push('scripts')

{{-- HERO SLIDER --}}
<script>
    const slides = document.querySelectorAll('[data-slide]');
    let current = 0;
    setInterval(() => {
        slides[current].classList.replace('opacity-100', 'opacity-0');
        current = (current + 1) % slides.length;
        slides[current].classList.replace('opacity-0', 'opacity-100');
    }, 5000);
</script>

{{-- HOVER BERITA --}}
<script>
    document.querySelectorAll('.berita-card').forEach(card => {
        card.addEventListener('mouseenter', () =>
            anime({ targets: card, scale: 1.05, duration: 250 })
        );
        card.addEventListener('mouseleave', () =>
            anime({ targets: card, scale: 1, duration: 250 })
        );
    });
</script>

{{-- ASPIRASI AJAX + SHAKE --}}
<script>
const form = document.getElementById('aspirasiForm');
const msg  = document.getElementById('aspirasiMessage');

form.addEventListener('submit', async e => {
    e.preventDefault();
    msg.classList.add('hidden');

    const res = await fetch("{{ route('aspirasi.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: new FormData(form)
    });

    const data = await res.json();

    if (!res.ok) {
        msg.className = "mb-4 p-3 rounded bg-red-100 text-red-700 text-center";
        msg.innerText = data.message;
        msg.classList.remove('hidden');

        anime({
            targets: '#aspirasiForm',
            translateX: [-10, 10, -6, 6, 0],
            duration: 500
        });
        return;
    }

    msg.className = "mb-4 p-3 rounded bg-green-100 text-green-700 text-center";
    msg.innerText = data.message;
    msg.classList.remove('hidden');
    form.reset();
});
</script>

@endpush
