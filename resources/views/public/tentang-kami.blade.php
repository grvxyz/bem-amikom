@extends('layouts.public')

@section('content')

{{-- HERO --}}
<section class="bg-[#6e1423] text-white py-28">
    <div class="max-w-6xl mx-auto px-6 text-center animate-on-scroll">
        <h1 class="text-4xl md:text-5xl font-bold">
            Kabinet Daya Juang
        </h1>
        <p class="mt-6 text-lg max-w-3xl mx-auto text-white/90">
            Badan Eksekutif Mahasiswa Universitas AMIKOM Yogyakarta
            sebagai wadah gerakan mahasiswa yang progresif,
            inklusif, dan berdampak nyata.
        </p>
    </div>
</section>

{{-- PROFIL --}}
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

        <div class="animate-on-scroll">
            <h2 class="text-3xl font-bold text-[#6e1423] mb-6">
                Profil BEM AMIKOM
            </h2>
            <p class="text-gray-600 leading-relaxed">
                BEM AMIKOM merupakan lembaga eksekutif mahasiswa
                yang berfungsi sebagai penggerak aspirasi,
                pengawal kebijakan kampus, serta fasilitator
                pengembangan potensi mahasiswa.
            </p>
        </div>

        <div class="grid grid-cols-2 gap-6 animate-on-scroll">
            <div class="p-6 rounded-xl shadow bg-gray-50">
                <h4 class="font-semibold text-[#6e1423]">Progresif</h4>
                <p class="text-sm text-gray-600 mt-2">
                    Adaptif terhadap perubahan zaman
                </p>
            </div>
            <div class="p-6 rounded-xl shadow bg-gray-50">
                <h4 class="font-semibold text-[#6e1423]">Inklusif</h4>
                <p class="text-sm text-gray-600 mt-2">
                    Merangkul seluruh mahasiswa
                </p>
            </div>
            <div class="p-6 rounded-xl shadow bg-gray-50">
                <h4 class="font-semibold text-[#6e1423]">Kolaboratif</h4>
                <p class="text-sm text-gray-600 mt-2">
                    Bersinergi dengan berbagai pihak
                </p>
            </div>
            <div class="p-6 rounded-xl shadow bg-gray-50">
                <h4 class="font-semibold text-[#6e1423]">Berdampak</h4>
                <p class="text-sm text-gray-600 mt-2">
                    Fokus pada manfaat nyata
                </p>
            </div>
        </div>

    </div>
</section>

{{-- STRUKTUR KABINET --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        {{-- JUDUL --}}
        <div class="text-center mb-20 animate-on-scroll">
            <h2 class="text-3xl font-bold text-[#6e1423]">
                Struktur Kabinet
            </h2>
            <p class="text-gray-600 mt-4">
                Susunan Pengurus Kabinet Daya Juang
            </p>
        </div>

        {{-- KETUA & WAKIL --}}
        <div class="grid md:grid-cols-2 gap-12 mb-24">

            {{-- KETUA --}}
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center animate-on-scroll hover:-translate-y-2 transition">
                <img src="{{ asset('storage/image/ketua.jpg') }}"
                     class="w-32 h-32 rounded-full mx-auto mb-4 object-cover shadow">

                <h3 class="text-xl font-bold text-gray-800">
                    Alvito Avriansyah
                </h3>
                <p class="text-[#6e1423] font-semibold mb-4">
                    Ketua BEM AMIKOM 2025
                </p>

                <p class="text-sm text-gray-600 italic">
                    “Kabinet Daya Juang hadir sebagai gerakan kolektif
                    untuk memperjuangkan aspirasi mahasiswa.”
                </p>
            </div>

            {{-- WAKIL --}}
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center animate-on-scroll hover:-translate-y-2 transition">
                <img src="{{ asset('storage/image/wakil.jpg') }}"
                     class="w-32 h-32 rounded-full mx-auto mb-4 object-cover shadow">

                <h3 class="text-xl font-bold text-gray-800">
                    Alfid Diaz Fernanda
                </h3>
                <p class="text-[#6e1423] font-semibold mb-4">
                    Wakil Ketua BEM AMIKOM 2025
                </p>

                <p class="text-sm text-gray-600 italic">
                    “Sinergi dan kolaborasi menjadi kunci
                    dalam membangun gerakan mahasiswa.”
                </p>
            </div>

        </div>

        {{-- MENKO --}}
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-10">

    <div class="bg-white p-6 rounded-2xl shadow-md text-center
                hover:-translate-y-2 transition animate-on-scroll">
        <img src="{{ asset('storage/image/sekjen.jpg') }}"
             class="w-28 h-28 rounded-full mx-auto object-cover shadow mb-4">

        <h4 class="font-semibold text-gray-800">
            Heni Sapta Mawar
        </h4>
        <p class="text-sm text-gray-500">
            Sekretaris Jenderal
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md text-center
                hover:-translate-y-2 transition animate-on-scroll">
        <img src="{{ asset('storage/image/FELIZ.jpg') }}"
             class="w-28 h-28 rounded-full mx-auto object-cover shadow mb-4">

        <h4 class="font-semibold text-gray-800">
            Aurelius Feliz Ergi N.
        </h4>
        <p class="text-sm text-gray-500">
            Menteri Koordinator Kebijakan & Kemahasiswaan 
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md text-center
                hover:-translate-y-2 transition animate-on-scroll">
        <img src="{{ asset('storage/image/FAIZA.jpg') }}"
             class="w-28 h-28 rounded-full mx-auto object-cover shadow mb-4">

        <h4 class="font-semibold text-gray-800">
            Nurul Faiza Umami
        </h4>
        <p class="text-sm text-gray-500">
            Menteri Koordinator Pemberdayaan Manusia & Kebudayaan 
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md text-center
                hover:-translate-y-2 transition animate-on-scroll">
        <img src="{{ asset('storage/image/ANGEL.jpg') }}"
             class="w-28 h-28 rounded-full mx-auto object-cover shadow mb-4">

        <h4 class="font-semibold text-gray-800">
            Angelia Maharani W.
        </h4>
        <p class="text-sm text-gray-500">
            Menteri Koordinator Komunikasi & Investasi Kreatif
        </p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md text-center
                hover:-translate-y-2 transition animate-on-scroll">
        <img src="{{ asset('storage/image/BAGUS.jpg') }}"
             class="w-28 h-28 rounded-full mx-auto object-cover shadow mb-4">

        <h4 class="font-semibold text-gray-800">
            Dimas Bagus S.
        </h4>
        <p class="text-sm text-gray-500">
            Menteri Koordinator Pergerakan Sosial & Politik
        </p>
    </div>

</div>


    </div>
</section>



{{-- VISI MISI --}}
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl font-bold text-[#6e1423]">
                Visi & Misi
            </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-16">

            <div class="animate-on-scroll">
                <h3 class="text-2xl font-semibold mb-4">Visi</h3>
                <p class="text-gray-600 leading-relaxed">
                    Mewujudkan BEM AMIKOM sebagai pusat gerakan
                    mahasiswa yang progresif, sinergis,
                    dan berkontribusi aktif bagi kampus
                    serta masyarakat.
                </p>
            </div>

            <div class="animate-on-scroll">
                <h3 class="text-2xl font-semibold mb-4">Misi</h3>
                <ul class="list-disc list-inside space-y-3 text-gray-600">
                    <li>Mengawal aspirasi mahasiswa</li>
                    <li>Mendorong pengembangan potensi</li>
                    <li>Membangun gerakan kolaboratif</li>
                    <li>Menciptakan program kerja berdampak</li>
                </ul>
            </div>

        </div>
    </div>
</section>

{{-- NILAI --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center animate-on-scroll">
        <h2 class="text-3xl font-bold text-[#6e1423] mb-12">
            Nilai-Nilai Organisasi
        </h2>

        <div class="grid md:grid-cols-4 gap-8">
            <div class="p-6 shadow rounded-xl bg-white">Integritas</div>
            <div class="p-6 shadow rounded-xl bg-white">Amanah</div>
            <div class="p-6 shadow rounded-xl bg-white">Komunikatif</div>
            <div class="p-6 shadow rounded-xl bg-white">Produktif</div>
        </div>
    </div>
</section>

{{-- ANIMASI --}}
<style>
.animate-on-scroll {
    opacity: 0;
    transform: translateY(40px);
    transition: all .8s ease;
}
.animate-on-scroll.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    });
}, { threshold: 0.15 });

document.querySelectorAll('.animate-on-scroll')
    .forEach(el => observer.observe(el));
</script>

@endsection
