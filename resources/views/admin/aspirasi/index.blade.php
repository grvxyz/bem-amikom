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

    {{-- ================= FLASH MESSAGE ================= --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ================= TABLE ================= --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="p-3 text-left">Nama Pengirim</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Isi Aspirasi</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-center w-32">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($data as $item)
                <tr class="border-t hover:bg-gray-50 align-top">
                    <td class="p-3 font-medium">
                        {{ $item->nama_pengirim }}
                    </td>
                    <td class="p-3">
                        {{ $item->email ?? '-' }}
                    </td>
                    <td class="p-3">
                        {{ $item->isi_aspirasi }}
                    </td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs
                            @if($item->status == 'baru') bg-blue-100 text-blue-700
                            @elseif($item->status == 'diproses') bg-yellow-100 text-yellow-700
                            @else bg-green-100 text-green-700
                            @endif">
                            {{ ucfirst($item->status) }}
                        </span>
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
                    <td colspan="5" class="text-center p-6 text-gray-500">
                        Belum ada aspirasi
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="mt-4">
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
                    class="border w-full p-2 rounded mt-1"
                    placeholder="Nama lengkap" required>
            </div>

            <div class="mb-3">
                <label class="text-sm font-medium">Email (Opsional)</label>
                <input type="email" name="email"
                    class="border w-full p-2 rounded mt-1"
                    placeholder="email@example.com">
            </div>

            <div class="mb-4">
                <label class="text-sm font-medium">Isi Aspirasi</label>
                <textarea name="isi_aspirasi"
                    class="border w-full p-2 rounded mt-1"
                    rows="4"
                    placeholder="Tuliskan aspirasi..." required></textarea>
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
function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden')
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden')
}
</script>
@endpush
