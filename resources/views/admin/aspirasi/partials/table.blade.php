@forelse($data as $item)
<tr class="border-t align-top">
    <td class="p-3 font-medium">{{ $item->nama_pengirim }}</td>
    <td class="p-3">{{ $item->email }}</td>
    <td class="p-3">{{ $item->isi_aspirasi }}</td>
    <td class="p-3">
        <span class="px-2 py-1 rounded text-xs
            @if($item->status=='baru') bg-blue-100 text-blue-700
            @elseif($item->status=='diproses') bg-yellow-100 text-yellow-700
            @else bg-green-100 text-green-700 @endif">
            {{ ucfirst($item->status) }}
        </span>
    </td>
    <td class="p-3 text-xs text-gray-500">
        {{ $item->created_at->format('d M Y H:i') }}
    </td>
    <td class="p-3 text-center">
        {{-- aksi tetap --}}
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center p-6 text-gray-500">
        Tidak ada data
    </td>
</tr>
@endforelse
