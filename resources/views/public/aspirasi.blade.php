@extends('layouts.public')

@section('title', 'BEM AMIKOM')

@section('content')

{{-- ================= ASPIRASI ================= --}}
<section id="aspirasi" class="py-20 bg-gray-100">
    <div class="max-w-2xl mx-auto px-6">

        <h2 class="text-2xl font-bold text-center text-[#6e1423] mb-2">
            Sampaikan Aspirasi
        </h2>

        <p class="text-center text-gray-600 mb-8">
            Kritik & saran Anda akan kami proses secara bertanggung jawab.
        </p>

        <div id="aspirasiMessage"
             class="hidden mb-4 p-3 rounded text-center text-sm">
        </div>

        <form id="aspirasiForm" class="bg-white p-6 rounded-xl shadow space-y-4">
            @csrf

            <input type="text" name="nama_pengirim" placeholder="Nama"
                   class="w-full border px-3 py-2 rounded" required>

            <input type="email" name="email" placeholder="Email (@amikom.ac.id)"
                   class="w-full border px-3 py-2 rounded">

            <textarea name="isi_aspirasi" rows="4"
                      class="w-full border px-3 py-2 rounded"
                      placeholder="Tulis aspirasi..." required></textarea>

            <button type="submit"
                    class="w-full bg-[#6e1423] text-white py-2 rounded">
                Kirim Aspirasi
            </button>
        </form>

    </div>
</section>

{{-- ================= FAQ ================= --}}
<section id="faq" class="py-20 bg-gray-100">
    <div class="max-w-4xl mx-auto px-6">

        <h2 class="text-2xl font-bold text-center text-[#6e1423] mb-4">
            Frequently Asked Questions
        </h2>

        <p class="text-center text-gray-600 mb-10">
            Pertanyaan yang sering diajukan seputar BEM AMIKOM
        </p>

        <div class="space-y-4">

            <div class="faq-item border rounded-xl overflow-hidden">
                <button class="faq-btn w-full flex justify-between items-center p-4 font-medium bg-gray-50">
                    <span>Apa itu BEM AMIKOM?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    BEM AMIKOM adalah Badan Eksekutif Mahasiswa Universitas AMIKOM Yogyakarta
                    yang menjadi wadah aspirasi dan penggerak mahasiswa.
                </div>
            </div>

            <div class="faq-item border rounded-xl overflow-hidden">
                <button class="faq-btn w-full flex justify-between items-center p-4 font-medium bg-gray-50">
                    <span>Bagaimana cara menyampaikan aspirasi?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    Aspirasi dapat dikirim melalui form aspirasi di atas
                    dan akan diproses oleh tim BEM AMIKOM.
                </div>
            </div>

            <div class="faq-item border rounded-xl overflow-hidden">
                <button class="faq-btn w-full flex justify-between items-center p-4 font-medium bg-gray-50">
                    <span>Apakah aspirasi bersifat rahasia?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    Ya, seluruh aspirasi dijaga kerahasiaannya dan digunakan
                    untuk kepentingan organisasi secara profesional.
                </div>
            </div>

            <div class="faq-item border rounded-xl overflow-hidden">
                <button class="faq-btn w-full flex justify-between items-center p-4 font-medium bg-gray-50">
                    <span>Siapa yang boleh mengirim aspirasi?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-content hidden px-4 pb-4 text-gray-600">
                    Seluruh mahasiswa Universitas AMIKOM Yogyakarta.
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= SCRIPT ================= --}}
<script>
const form = document.getElementById('aspirasiForm');
const msg  = document.getElementById('aspirasiMessage');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    msg.classList.add('hidden');

    try {
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
            msg.className = "mb-4 p-3 rounded bg-red-100 text-red-700 text-center text-sm";
            msg.innerText = data.message ?? 'Terjadi kesalahan.';
            msg.classList.remove('hidden');

            anime({
                targets: '#aspirasiForm',
                translateX: [-12, 12, -8, 8, 0],
                duration: 500
            });
            return;
        }

        msg.className = "mb-4 p-3 rounded bg-green-100 text-green-700 text-center text-sm";
        msg.innerText = data.message;
        msg.classList.remove('hidden');
        form.reset();

    } catch {
        msg.className = "mb-4 p-3 rounded bg-red-100 text-red-700 text-center text-sm";
        msg.innerText = "Server tidak merespons.";
        msg.classList.remove('hidden');
    }
});

/* FAQ ACCORDION */
document.querySelectorAll('.faq-btn').forEach(btn => {
    btn.addEventListener('click', () => {

        const content = btn.nextElementSibling;
        const icon = btn.querySelector('.faq-icon');
        const isOpen = !content.classList.contains('hidden');

        document.querySelectorAll('.faq-content').forEach(el => {
            el.classList.add('hidden');
            el.style.height = null;
            el.previousElementSibling.querySelector('.faq-icon').innerText = '+';
        });

        if (!isOpen) {
            content.classList.remove('hidden');
            anime({
                targets: content,
                height: [0, content.scrollHeight],
                opacity: [0, 1],
                duration: 300,
                easing: 'easeOutQuad',
                complete: () => content.style.height = 'auto'
            });
            icon.innerText = '−';
        }
    });
});
</script>

@endsection
