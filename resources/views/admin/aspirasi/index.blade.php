@extends('layouts.admin')

@section('title', 'Aspirasi')
@section('page-title', 'Aspirasi')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">

    {{-- ================= HEADER ================= --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-lg font-semibold">Data Aspirasi</h1>
            <p class="text-sm text-gray-500">Kelola aspirasi mahasiswa</p>
        </div>

        <button onclick="openAddModal()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
            + Tambah Aspirasi
        </button>
    </div>

    {{-- ================= FLASH ================= --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ================= FILTER (AUTO AJAX) ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
        <select id="filterBulan" class="border rounded px-3 py-2 text-sm">
            <option value="">Semua Bulan</option>
            @for($i=1; $i<=12; $i++)
                <option value="{{ $i }}">
                    {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                </option>
            @endfor
        </select>

        <select id="filterTahun" class="border rounded px-3 py-2 text-sm">
            <option value="">Semua Tahun</option>
            @for($y = now()->year; $y >= now()->year - 5; $y--)
                <option value="{{ $y }}">{{ $y }}</option>
            @endfor
        </select>

        <select id="filterStatus" class="border rounded px-3 py-2 text-sm">
            <option value="">Semua Status</option>
            <option value="baru">Baru</option>
            <option value="diproses">Diproses</option>
            <option value="selesai">Selesai</option>
        </select>
    </div>

    {{-- ================= TABLE ================= --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Isi Aspirasi</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-center w-36">Aksi</th>
                </tr>
            </thead>

            <tbody id="aspirasiTable">
            @forelse($data as $item)
                <tr class="border-t align-top hover:bg-gray-50">
                    <td class="p-3 font-medium">{{ $item->nama_pengirim }}</td>
                    <td class="p-3">{{ $item->email }}</td>
                    <td class="p-3">{{ $item->isi_aspirasi }}</td>

                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs
                            @if($item->status=='baru') bg-blue-100 text-blue-700
                            @elseif($item->status=='diproses') bg-yellow-100 text-yellow-700
                            @else bg-green-100 text-green-700 @endif">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>

                    <td class="p-3 text-xs text-gray-500">
                        {{ $item->created_at->format('d M Y') }} <br>
                        {{ $item->created_at->format('H:i') }} WIB
                    </td>

                    <td class="p-3 text-center space-y-2">
                        {{-- UPDATE STATUS --}}
                        <form method="POST" action="{{ route('aspirasi.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <select name="status"
                                onchange="this.form.submit()"
                                class="border rounded px-2 py-1 text-xs w-full">
                                <option value="baru" @selected($item->status=='baru')>Baru</option>
                                <option value="diproses" @selected($item->status=='diproses')>Diproses</option>
                                <option value="selesai" @selected($item->status=='selesai')>Selesai</option>
                            </select>
                        </form>

                        {{-- DELETE --}}
                        <form method="POST"
                            action="{{ route('aspirasi.destroy', $item->id) }}"
                            onsubmit="return confirm('Hapus aspirasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs w-full">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-6 text-gray-500">
                        Tidak ada data
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="mt-4" id="pagination">
        {{ $data->links() }}
    </div>
</div>

{{-- ================= MODAL TAMBAH ASPIRASI ================= --}}
<div id="addModal"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl w-full max-w-lg p-6">
        <h2 class="font-semibold text-lg mb-4">Tambah Aspirasi</h2>

        <form method="POST" action="{{ route('aspirasi.store') }}">
            @csrf

            <div class="mb-3">
                <label class="text-sm font-medium">Nama Pengirim</label>
                <input type="text" name="nama_pengirim"
                    class="border w-full p-2 rounded mt-1" required>
            </div>

            <div class="mb-3">
                <label class="text-sm font-medium">Email AMIKOM</label>
                <input type="email" name="email"
                    class="border w-full p-2 rounded mt-1"
                    placeholder="nama@amikom.ac.id" required>
            </div>

            <div class="mb-4">
                <label class="text-sm font-medium">Isi Aspirasi</label>
                <textarea name="isi_aspirasi"
                    class="border w-full p-2 rounded mt-1"
                    rows="4" required></textarea>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button"
                    onclick="closeAddModal()"
                    class="px-4 py-2 text-gray-600 hover:text-gray-800">
                    Batal
                </button>
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
const filterBulan  = document.getElementById('filterBulan')
const filterTahun  = document.getElementById('filterTahun')
const filterStatus = document.getElementById('filterStatus')

const baseUrl = "{{ route('aspirasi.index') }}"

async function fetchAspirasi(url = baseUrl) {
    const params = new URLSearchParams({
        bulan: filterBulan.value,
        tahun: filterTahun.value,
        status: filterStatus.value
    })

    const response = await fetch(url + '?' + params.toString(), {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })

    if (!response.ok) {
        console.error('Fetch error:', response.status)
        return
    }

    const html = await response.text()
    const dom  = new DOMParser().parseFromString(html, 'text/html')

    const table = dom.getElementById('aspirasiTable')
    const pagination = dom.getElementById('pagination')

    if (table && pagination) {
        document.getElementById('aspirasiTable').innerHTML = table.innerHTML
        document.getElementById('pagination').innerHTML = pagination.innerHTML
    }
}

/* AUTO FILTER (TANPA BUTTON, TANPA RELOAD) */
filterBulan.addEventListener('change', () => fetchAspirasi())
filterTahun.addEventListener('change', () => fetchAspirasi())
filterStatus.addEventListener('change', () => fetchAspirasi())

/* PAGINATION AJAX */
document.addEventListener('click', function(e) {
    const link = e.target.closest('#pagination a')
    if (link) {
        e.preventDefault()
        fetchAspirasi(link.href)
    }
})

function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden')
}
function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden')
}
</script>
@endpush

