<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaAcaraController extends Controller
{
    /**
     * Tampilkan daftar berita acara
     */
    public function index(Request $request)
    {
        $query = BeritaAcara::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        $data = $query->latest()->paginate(10)->withQueryString();

        return view('admin.berita_acara.index', compact('data'));
    }

    /**
     * Simpan berita acara baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'isi'       => 'required|string',
            'foto'      => 'nullable|image|max:2048',
            'is_active' => 'nullable|in:0,1',
        ]);

        // Buat slug unik
        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $i = 1;

        while (BeritaAcara::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }

        $validated['slug'] = $slug;
        $validated['user_id'] = auth()->id();
        $validated['is_active'] = $validated['is_active'] ?? 1;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('berita', 'public');
        }

        BeritaAcara::create($validated);

        return redirect()
            ->route('berita_acara.index')
            ->with('success', 'Berita acara berhasil ditambahkan');
    }

    /**
     * Update berita acara
     * ⚠️ PENTING: nama parameter HARUS $berita_acara
     * karena route = {berita_acara}
     */
    public function update(Request $request, BeritaAcara $berita_acara)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'isi'       => 'required|string',
            'foto'      => 'nullable|image|max:2048',
            'is_active' => 'required|in:0,1',
        ]);

        // Update slug jika judul berubah
        if ($validated['judul'] !== $berita_acara->judul) {
            $berita_acara->slug =
                Str::slug($validated['judul']) . '-' . $berita_acara->id;
        }

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            if ($berita_acara->foto) {
                Storage::disk('public')->delete($berita_acara->foto);
            }

            $berita_acara->foto = $request->file('foto')
                ->store('berita', 'public');
        }

        // Update data utama
        $berita_acara->update([
            'judul'     => $validated['judul'],
            'isi'       => $validated['isi'],
            'is_active' => $validated['is_active'],
        ]);

        return redirect()
            ->route('berita_acara.index')
            ->with('success', 'Berita acara berhasil diperbarui');
    }

    /**
     * Hapus berita acara
     */
    public function destroy(BeritaAcara $berita_acara)
    {
        if ($berita_acara->foto) {
            Storage::disk('public')->delete($berita_acara->foto);
        }

        $berita_acara->delete();

        return redirect()
            ->route('berita_acara.index')
            ->with('success', 'Berita acara berhasil dihapus');
    }
}
