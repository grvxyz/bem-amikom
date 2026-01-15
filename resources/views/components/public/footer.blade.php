<footer class="bg-[#6e1423] text-white text-sm">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Tentang -->
            <div>
                <h3 class="text-white font-semibold text-base mb-3">
                    BEM AMIKOM
                </h3>
                <p class="text-white-400 leading-relaxed">
                    Badan Eksekutif Mahasiswa Universitas AMIKOM Yogyakarta
                    sebagai wadah aspirasi, kepemimpinan, dan pengabdian mahasiswa.
                </p>
            </div>

            <!-- Navigasi -->
            <div>
                <h3 class="text-white font-semibold text-base mb-3">
                    Navigasi
                </h3>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="/berita" class="hover:text-white transition">Berita</a></li>
                    <li><a href="/agenda" class="hover:text-white transition">Agenda</a></li>
                    <li><a href="/kontak" class="hover:text-white transition">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="text-white font-semibold text-base mb-3">
                    Kontak
                </h3>
                <p class="text-white-400">
                    Universitas AMIKOM Yogyakarta
                </p>
                <p class="text-white-400">
                    Gedung BSC, Ring Road Utara
                </p>
                <p class="mt-2">
                    Email:
                    <a href="mailto:bem@amikom.ac.id" class="hover:text-white transition">
                        bem@amikom.ac.id
                    </a>
                </p>
            </div>

            <!-- Peta -->
            <div>
                <h3 class="text-white font-semibold text-base mb-3">
                    Lokasi
                </h3>

                <!-- Map Link ke Google Maps -->
                <a href="https://www.google.com/maps?q=-7.7596,110.4088" target="_blank">
                    <div
                        id="map"
                        class="w-full h-48 rounded-lg overflow-hidden border border-white-700 cursor-pointer"
                        title="Klik untuk buka di Google Maps"
                    ></div>
                </a>

                <a
                    href="https://www.google.com/maps?q=-7.7596,110.4088"
                    target="_blank"
                    class="inline-block mt-2 text-xs text-blue-400 hover:text-blue-300 transition"
                >
                    Lihat di Google Maps →
                </a>
            </div>

        </div>

        <!-- COPYRIGHT -->
        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-white-500">
            <p>
                © {{ date('Y') }}
                <span class="text-white-300 font-medium">BEM AMIKOM</span>.
                Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>
</footer>
