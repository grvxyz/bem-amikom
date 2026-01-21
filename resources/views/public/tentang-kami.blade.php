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
                Salam Pimpinan
            </h2>
            <p class="text-gray-600 mt-4">
                Kuat Dalam Persatuan, Tangguh Dalam Perjuangan
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
{{-- ================= STRUKTUR KABINET ================= --}}
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        {{-- JUDUL --}}
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-5xl font-extrabold text-[#6e1423]">
                Struktur <span class="text-gray-800">Kabinet</span>
            </h2>
            <p class="mt-4 text-lg text-gray-600">
                Pilar pergerakan Badan Eksekutif Mahasiswa Universitas AMIKOM Yogyakarta
            </p>
        </div>

        {{-- ACCORDION --}}
        <div class="max-w-4xl mx-auto space-y-6" id="struktur-accordion">

            {{-- KEMENKOAN KEBIJAKAN & KEMAHASISWAAN --}}
            <div class="accordion-item border rounded-xl shadow overflow-hidden">
                <button class="accordion-header w-full px-6 py-5 bg-[#6e1423] text-white font-bold flex justify-between items-center">
                    <span>Kemenkoan Kebijakan & Kemahasiswaan</span>
                    <span class="accordion-icon">⌄</span>
                </button>
                <div class="accordion-content max-h-0 overflow-hidden bg-gray-50 transition-all duration-500">
                    <div class="p-6 space-y-4 text-gray-700 text-sm">
                        <p>
                            Kemenkoan ini mengoordinasikan kementerian yang bergerak
                            dalam ranah kebijakan internal kampus serta dinamika kemahasiswaan.
                            Fokus utama pada sinergi organisasi mahasiswa, penyelesaian
                            persoalan internal, serta perjuangan hak dan kesejahteraan mahasiswa.
                        </p>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Dalam Negeri</h5>
                            <p class="mt-1">
                                Menjaga hubungan harmonis antar elemen KM AMIKOM,
                                menyelesaikan persoalan lembaga mahasiswa, serta merancang
                                kebijakan strategis internal dan eksternal BEM.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Dirjen Bina Administrasi & Keluarga Mahasiswa</h5>
                            <p class="mt-1">
                                Melakukan kontrol administratif UKM dan BSO agar
                                organisasi mahasiswa berjalan tertib dan berkelanjutan.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Dirjen Kebijakan Publik & Politik</h5>
                            <p class="mt-1">
                                Menyusun produk hukum internal, mengelola arsip hukum,
                                serta merancang regulasi tata kelola organisasi yang adil.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Advokasi Kesejahteraan Mahasiswa</h5>
                            <p class="mt-1">
                                Menjadi jembatan mahasiswa dengan rektorat dalam
                                memperjuangkan hak akademik, beasiswa, dan fasilitas kampus.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Kajian Strategis Perguruan Tinggi</h5>
                            <p class="mt-1">
                                Pusat riset isu internal kampus dan penyajiannya dalam
                                bentuk media edukatif berbasis data dan kajian objektif.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KEMENKOAN PMK --}}
            <div class="accordion-item border rounded-xl shadow overflow-hidden">
                <button class="accordion-header w-full px-6 py-5 bg-[#6e1423] text-white font-bold flex justify-between items-center">
                    <span>Kemenkoan Pemberdayaan Manusia & Kebudayaan</span>
                    <span class="accordion-icon">⌄</span>
                </button>
                <div class="accordion-content max-h-0 overflow-hidden bg-gray-50 transition-all duration-500">
                    <div class="p-6 space-y-4 text-sm text-gray-700">
                        <p>
                            Berfokus pada pengembangan SDM, nilai spiritual,
                            kebudayaan, serta inklusivitas mahasiswa agar berkembang
                            secara holistik akademik dan sosial.
                        </p>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">PSDM</h5>
                            <p>Pengembangan potensi mahasiswa melalui pelatihan, workshop,
                                dan peningkatan soft skill.</p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Agama</h5>
                            <p>
                                Fasilitator kegiatan keagamaan dan penjaga harmoni
                                serta toleransi kehidupan beragama di kampus.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Pemuda & Olahraga</h5>
                            <p>
                                Mengembangkan minat dan bakat mahasiswa di bidang olahraga
                                dan kegiatan non-akademik.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Pemberdayaan Perempuan</h5>
                            <p>
                                Mendorong lingkungan kampus yang aman, setara,
                                inklusif, serta bebas diskriminasi dan kekerasan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KEMENKOAN KOMUNIKASI & INVESTASI KREATIF --}}
            <div class="accordion-item border rounded-xl shadow overflow-hidden">
                <button class="accordion-header w-full px-6 py-5 bg-[#6e1423] text-white font-bold flex justify-between items-center">
                    <span>Kemenkoan Komunikasi & Investasi Kreatif</span>
                    <span class="accordion-icon">⌄</span>
                </button>
                <div class="accordion-content max-h-0 overflow-hidden bg-gray-50 transition-all duration-500">
                    <div class="p-6 space-y-4 text-sm text-gray-700">

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Komunikasi & Informasi</h5>
                            <p>
                                Mengelola arus informasi, publikasi, dan citra BEM
                                melalui media digital yang kreatif dan edukatif.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Dirjen Digitalisasi Eksekutif</h5>
                            <p>
                                Mengembangkan sistem website dan platform digital resmi BEM.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Dirjen Jejaring & Sosial Media</h5>
                            <p>
                                Dokumentasi, pengarsipan, serta pengelolaan sosial media BEM.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Investasi Kreatif</h5>
                            <p>
                                Wadah kewirausahaan, ekonomi kreatif,
                                dan kolaborasi strategis dengan mitra eksternal.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            {{-- KEMENKOAN PERGERAKAN SOSIAL & POLITIK --}}
            <div class="accordion-item border rounded-xl shadow overflow-hidden">
                <button class="accordion-header w-full px-6 py-5 bg-[#6e1423] text-white font-bold flex justify-between items-center">
                    <span>Kemenkoan Pergerakan Sosial & Politik</span>
                    <span class="accordion-icon">⌄</span>
                </button>
                <div class="accordion-content max-h-0 overflow-hidden bg-gray-50 transition-all duration-500">
                    <div class="p-6 space-y-4 text-sm text-gray-700">

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Sosial Masyarakat</h5>
                            <p>
                                Pengabdian masyarakat melalui program sosial,
                                pendidikan, dan penguatan komunitas.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Aksi & Propaganda</h5>
                            <p>
                                Edukasi dan kampanye isu sosial-politik
                                berbasis riset dan publikasi kreatif.
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <h5 class="font-semibold text-[#6e1423]">Kementerian Luar Negeri</h5>
                            <p>
                                Representasi resmi BEM di tingkat regional
                                dan nasional melalui jejaring eksternal.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




{{-- ================= VISI MISI ================= --}}
{{-- ================= VISI & MISI ================= --}}
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-8 items-start">

            {{-- VISI --}}
            <div class="bg-[#6e1423] text-white p-8 rounded-2xl shadow-lg
                        flex flex-col justify-center h-full"
                 data-aos="zoom-in">

                <h3 class="text-2xl font-bold mb-4 text-center">
                    Visi
                </h3>

                <blockquote
                    class="text-center text-lg sm:text-xl font-semibold
                           leading-relaxed italic">
                    “BEM Universitas AMIKOM Yogyakarta menjadi organisasi yang
                    berdaya dan berbudaya untuk mewujudkan kebermanfaatan nyata
                    bagi Keluarga Mahasiswa dan Indonesia dengan berlandaskan
                    Ketuhanan Yang Maha Esa.”
                </blockquote>
            </div>

            {{-- MISI --}}
            <div class="space-y-4"
                 data-aos="fade-left"
                 data-aos-delay="200">

                <h3 class="text-2xl font-bold mb-4 text-gray-800
                           text-center lg:text-left">
                    Misi
                </h3>

                <div class="space-y-3" id="misi-accordion">

                    {{-- ITEM 1 --}}
                    <div class="bg-white p-4 rounded-xl shadow-lg">
                        <button class="accordion-button w-full flex items-start
                                       text-left space-x-4">

                            <div class="flex-shrink-0 w-10 h-10
                                        bg-[#6e1423]/10 text-[#6e1423]
                                        rounded-lg flex items-center justify-center">
                                ✓
                            </div>

                            <div class="flex-grow">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-bold text-gray-800 text-md">
                                        Ruang Pengembangan Inklusif
                                    </h4>
                                    <span class="accordion-icon sm:hidden">⌄</span>
                                </div>

                                <p class="text-gray-600 text-sm mt-1 hidden sm:block">
                                    Menjadikan BEM AMIKOM sebagai ruang pengembangan
                                    inklusif dengan berfokus pada Tri Dharma Perguruan Tinggi.
                                </p>
                            </div>
                        </button>

                        <div class="accordion-content sm:hidden">
                            <p class="text-gray-600 text-sm pt-2 mt-2 border-t">
                                Menjadikan BEM AMIKOM sebagai ruang pengembangan
                                inklusif dengan berfokus pada Tri Dharma Perguruan Tinggi.
                            </p>
                        </div>
                    </div>

                    {{-- ITEM 2 --}}
                    <div class="bg-white p-4 rounded-xl shadow-lg">
                        <button class="accordion-button w-full flex items-start
                                       text-left space-x-4">

                            <div class="flex-shrink-0 w-10 h-10
                                        bg-[#6e1423]/10 text-[#6e1423]
                                        rounded-lg flex items-center justify-center">
                                ✓
                            </div>

                            <div class="flex-grow">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-bold text-gray-800 text-md">
                                        Media Aspirasi Mahasiswa
                                    </h4>
                                    <span class="accordion-icon sm:hidden">⌄</span>
                                </div>

                                <p class="text-gray-600 text-sm mt-1 hidden sm:block">
                                    Menjadikan BEM AMIKOM sebagai media aspiratif
                                    dalam pengadvokasian kesejahteraan mahasiswa.
                                </p>
                            </div>
                        </button>

                        <div class="accordion-content sm:hidden">
                            <p class="text-gray-600 text-sm pt-2 mt-2 border-t">
                                Menjadikan BEM AMIKOM sebagai media aspiratif
                                dalam pengadvokasian kesejahteraan mahasiswa.
                            </p>
                        </div>
                    </div>

                    {{-- ITEM 3 --}}
                    <div class="bg-white p-4 rounded-xl shadow-lg">
                        <button class="accordion-button w-full flex items-start
                                       text-left space-x-4">

                            <div class="flex-shrink-0 w-10 h-10
                                        bg-[#6e1423]/10 text-[#6e1423]
                                        rounded-lg flex items-center justify-center">
                                ✓
                            </div>

                            <div class="flex-grow">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-bold text-gray-800 text-md">
                                        Ruang Kreatif dan Inovatif
                                    </h4>
                                    <span class="accordion-icon sm:hidden">⌄</span>
                                </div>

                                <p class="text-gray-600 text-sm mt-1 hidden sm:block">
                                    Mendorong potensi seluruh civitas akademik
                                    melalui ruang yang kreatif dan inovatif.
                                </p>
                            </div>
                        </button>

                        <div class="accordion-content sm:hidden">
                            <p class="text-gray-600 text-sm pt-2 mt-2 border-t">
                                Mendorong potensi seluruh civitas akademik
                                melalui ruang yang kreatif dan inovatif.
                            </p>
                        </div>
                    </div>

                    {{-- ITEM 4 --}}
                    <div class="bg-white p-4 rounded-xl shadow-lg">
                        <button class="accordion-button w-full flex items-start
                                       text-left space-x-4">

                            <div class="flex-shrink-0 w-10 h-10
                                        bg-[#6e1423]/10 text-[#6e1423]
                                        rounded-lg flex items-center justify-center">
                                ✓
                            </div>

                            <div class="flex-grow">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-bold text-gray-800 text-md">
                                        Nilai Kebudayaan & Keagamaan
                                    </h4>
                                    <span class="accordion-icon sm:hidden">⌄</span>
                                </div>

                                <p class="text-gray-600 text-sm mt-1 hidden sm:block">
                                    Meningkatkan pemahaman dan penghargaan terhadap
                                    nilai kebudayaan dan keagamaan melalui kolaborasi kreatif.
                                </p>
                            </div>
                        </button>

                        <div class="accordion-content sm:hidden">
                            <p class="text-gray-600 text-sm pt-2 mt-2 border-t">
                                Meningkatkan pemahaman dan penghargaan terhadap
                                nilai kebudayaan dan keagamaan melalui kolaborasi kreatif.
                            </p>
                        </div>
                    </div>

                    {{-- ITEM 5 --}}
                    <div class="bg-white p-4 rounded-xl shadow-lg">
                        <button class="accordion-button w-full flex items-start
                                       text-left space-x-4">

                            <div class="flex-shrink-0 w-10 h-10
                                        bg-[#6e1423]/10 text-[#6e1423]
                                        rounded-lg flex items-center justify-center">
                                ✓
                            </div>

                            <div class="flex-grow">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-bold text-gray-800 text-md">
                                        Perluasan Jejaring Strategis
                                    </h4>
                                    <span class="accordion-icon sm:hidden">⌄</span>
                                </div>

                                <p class="text-gray-600 text-sm mt-1 hidden sm:block">
                                    Memperluas jejaring sebagai langkah progresif
                                    untuk mewujudkan kebermanfaatan nyata.
                                </p>
                            </div>
                        </button>

                        <div class="accordion-content sm:hidden">
                            <p class="text-gray-600 text-sm pt-2 mt-2 border-t">
                                Memperluas jejaring sebagai langkah progresif
                                untuk mewujudkan kebermanfaatan nyata.
                            </p>
                        </div>
                    </div>

                </div>
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
.accordion-content {
    transition: max-height 0.5s ease;
}
</style>
<script>
/* ===============================
ANIMATE ON SCROLL
=============================== */
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    });
}, { threshold: 0.15 });

document.querySelectorAll('.animate-on-scroll')
    .forEach(el => observer.observe(el));


/* ===============================
ACCORDION
=============================== */
document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
        const item = header.closest('.accordion-item');
        const content = item.querySelector('.accordion-content');
        const icon = header.querySelector('.accordion-icon');

        const isOpen = content.style.maxHeight;

        // Tutup semua accordion
        document.querySelectorAll('.accordion-content').forEach(c => {
            c.style.maxHeight = null;
        });

        document.querySelectorAll('.accordion-icon').forEach(i => {
            i.style.transform = 'rotate(0deg)';
        });

        // Toggle accordion yang diklik
        if (!isOpen) {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.style.transform = 'rotate(180deg)';
        }
    });
});
/* ===============================
ACCORDION MISI (MOBILE)
=============================== */
document.querySelectorAll('#misi-accordion .accordion-button')
    .forEach(button => {

    button.addEventListener('click', () => {
        const item = button.closest('.bg-white');
        const content = item.querySelector('.accordion-content');
        const icon = button.querySelector('.accordion-icon');

        // Tutup semua
        document.querySelectorAll('#misi-accordion .accordion-content')
            .forEach(c => c.classList.add('hidden'));

        document.querySelectorAll('#misi-accordion .accordion-icon')
            .forEach(i => i && (i.style.transform = 'rotate(0deg)'));

        // Toggle aktif
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            if (icon) icon.style.transform = 'rotate(180deg)';
        }
    });
});
</script>



@endsection
