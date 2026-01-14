@extends('layouts.admin')

@section('title', 'Event')
@section('page-title', 'Event')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-lg font-semibold">Data Event</h1>
        <button onclick="openAddModal()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
            + Tambah
        </button>
    </div>

    {{-- TABLE --}}
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="p-3">Nama Event</th>
                <th class="p-3">Deskripsi</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Lokasi</th>
                <th class="p-3">Poster</th>
                <th class="p-3 w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($data as $item)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-3 font-medium">{{ $item->nama_event }}</td>
                <td class="p-3">{{ $item->deskripsi }}</td>
                <td class="p-3">
                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }} -
                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                </td>
                <td class="p-3">{{ $item->lokasi }}</td>
                <td class="p-3">
                    @if($item->poster)
                        <img src="{{ asset('storage/'.$item->poster) }}" class="w-20 h-20 object-cover rounded">
                    @else
                        -
                    @endif
                </td>
                <td class="p-3 flex gap-2">
                    <button onclick="openEditModal(
                        {{ $item->id }},
                        @js($item->nama_event),
                        @js($item->deskripsi),
                        '{{ $item->tanggal_mulai }}',
                        '{{ $item->tanggal_selesai }}',
                        @js($item->lokasi)
                    )"
                    class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                        Edit
                    </button>

                    <form action="{{ route('events.destroy',$item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus data?')"
                            class="bg-red-600 text-white px-3 py-1 rounded text-xs">
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

    <div class="mt-4">
        {{ $data->links() }}
    </div>
</div>

{{-- MODAL TAMBAH --}}
<div id="addModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
<div class="bg-white rounded-xl w-1/2 p-6">
    <h2 class="font-semibold mb-4">Tambah Event</h2>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="nama_event" class="border w-full p-2 mb-2" placeholder="Nama Event" required>
        <textarea name="deskripsi" class="border w-full p-2 mb-2" placeholder="Deskripsi" required></textarea>
        <input type="date" name="tanggal_mulai" class="border w-full p-2 mb-2 rounded" required>
        <input type="date" name="tanggal_selesai" class="border w-full p-2 mb-2 rounded" required>
        <input name="lokasi" class="border w-full p-2 mb-2" placeholder="Lokasi" required>
        <input type="file" name="poster" class="border w-full p-2 mb-4">

        <div class="flex justify-end gap-2">
            <button type="button" onclick="closeAddModal()">Batal</button>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
</div>

{{-- MODAL EDIT --}}
<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
<div class="bg-white rounded-xl w-1/2 p-6">
    <h2 class="font-semibold mb-4">Edit Event</h2>

    <form id="editForm" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input id="editNamaEvent" name="nama_event" class="border w-full p-2 mb-2" required>
        <textarea id="editDeskripsi" name="deskripsi" class="border w-full p-2 mb-2" required></textarea>
        <input type="date" id="editTanggalMulai" name="tanggal_mulai" class="border w-full p-2 mb-2 rounded" required>
        <input type="date" id="editTanggalSelesai" name="tanggal_selesai" class="border w-full p-2 mb-2 rounded" required>
        <input id="editLokasi" name="lokasi" class="border w-full p-2 mb-2" required>
        <input type="file" name="poster" class="border w-full p-2 mb-4">

        <div class="flex justify-end gap-2">
            <button type="button" onclick="closeEditModal()">Batal</button>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
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

function openEditModal(id, nama, deskripsi, tanggalMulai, tanggalSelesai, lokasi) {
    document.getElementById('editModal').classList.remove('hidden')
    document.getElementById('editNamaEvent').value = nama
    document.getElementById('editDeskripsi').value = deskripsi
    document.getElementById('editTanggalMulai').value = tanggalMulai
    document.getElementById('editTanggalSelesai').value = tanggalSelesai
    document.getElementById('editLokasi').value = lokasi
    document.getElementById('editForm').action = `/admin/events/${id}`
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden')
}
</script>
@endpush
