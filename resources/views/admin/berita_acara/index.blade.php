@extends('layouts.admin')

@section('title', 'Berita Acara')
@section('page-title', 'Berita Acara')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-lg font-semibold">Data Berita Acara</h1>
            <p class="text-sm text-gray-500">Kelola berita acara kegiatan</p>
        </div>

        <button type="button"
            onclick="openAddModal()"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
            + Tambah
        </button>
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left">Foto</th>
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-center w-40">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($data as $item)
                <tr class="border-t align-middle">

                    {{-- FOTO --}}
                    <td class="p-3">
                        @if($item->foto)
                            <img src="{{ Storage::url($item->foto) }}"
                                 class="w-16 h-12 object-cover rounded">
                        @else
                            <span class="text-xs text-gray-400">Tidak ada</span>
                        @endif
                    </td>

                    {{-- JUDUL --}}
                    <td class="p-3 font-medium">
                        {{ $item->judul }}
                    </td>

                    {{-- STATUS --}}
                    <td class="p-3">
                        <span class="px-2 py-1 rounded-full text-xs
                            {{ $item->is_active
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700' }}">
                            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>

                    {{-- TANGGAL --}}
                    <td class="p-3">
                        {{ $item->created_at->format('d M Y') }}
                    </td>

                    {{-- AKSI --}}
                    <td class="p-3">
                        <div class="flex justify-center gap-2">

                            {{-- EDIT --}}
                            <button type="button"
                                onclick="openEditModal(
                                    '{{ $item->slug }}',
                                    @js($item->judul),
                                    @js($item->isi),
                                    '{{ $item->foto ? asset('storage/'.$item->foto) : '' }}',
                                    {{ $item->is_active ? 'true' : 'false' }}
                                )"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">
                                Edit
                            </button>

                            {{-- DELETE --}}
                            <form action="{{ route('berita_acara.destroy', $item->slug) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"
                        class="text-center p-6 text-gray-500">
                        Tidak ada data
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $data->links() }}
    </div>
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div id="addModal"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
<div class="bg-white rounded-xl w-full max-w-lg p-6">
    <h2 class="font-semibold text-lg mb-4">Tambah Berita Acara</h2>

    <form action="{{ route('berita_acara.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <input name="judul"
            class="border w-full p-2 mb-2 rounded"
            placeholder="Judul"
            required>

        <input type="file"
            name="foto"
            class="border w-full p-2 mb-2 rounded">

        <textarea name="isi"
            class="border w-full p-2 mb-2 rounded"
            rows="4"
            placeholder="Isi berita acara"
            required></textarea>

        <select name="is_active"
            class="border w-full p-2 mb-4 rounded">
            <option value="1">Aktif</option>
            <option value="0">Nonaktif</option>
        </select>

        <div class="flex justify-end gap-2">
            <button type="button" onclick="closeAddModal()">
                Batal
            </button>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div id="editModal"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
<div class="bg-white rounded-xl w-full max-w-lg p-6">
    <h2 class="font-semibold text-lg mb-4">Edit Berita Acara</h2>

    <form id="editForm"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input id="editJudul"
            name="judul"
            class="border w-full p-2 mb-2 rounded"
            required>

        <img id="previewFoto"
            class="w-full h-40 object-cover rounded mb-2 hidden">

        <input type="file"
            name="foto"
            class="border w-full p-2 mb-2 rounded">

        <textarea id="editIsi"
            name="isi"
            class="border w-full p-2 mb-2 rounded"
            rows="4"
            required></textarea>

        <select id="editStatus"
            name="is_active"
            class="border w-full p-2 mb-4 rounded">
            <option value="1">Aktif</option>
            <option value="0">Nonaktif</option>
        </select>

        <div class="flex justify-end gap-2">
            <button type="button" onclick="closeEditModal()">
                Batal
            </button>
            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Update
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

function openEditModal(id, judul, isi, foto, status) {
    document.getElementById('editModal').classList.remove('hidden')

    document.getElementById('editJudul').value = judul
    document.getElementById('editIsi').value = isi
    document.getElementById('editStatus').value = status ? 1 : 0

    // 🔥 PENTING: HARDCODE PREFIX ADMIN
    document.getElementById('editForm').action =
        `/admin/berita_acara/${id}`

    const preview = document.getElementById('previewFoto')
    if (foto) {
        preview.src = foto
        preview.classList.remove('hidden')
    } else {
        preview.classList.add('hidden')
    }
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden')
}
</script>
@endpush
