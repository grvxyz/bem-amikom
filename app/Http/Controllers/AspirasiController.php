<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AspirasiController extends Controller
{
    /**
     * ADMIN: List aspirasi
     */
    public function index(Request $request)
{
    $query = Aspirasi::query();

    if ($request->bulan) {
        $query->whereMonth('created_at', $request->bulan);
    }

    if ($request->tahun) {
        $query->whereYear('created_at', $request->tahun);
    }

    if ($request->status) {
        $query->where('status', $request->status);
    }

    $data = $query->latest()->paginate(10);

    return view('admin.aspirasi.index', compact('data'));
}


    /**
     * PUBLIC + ADMIN: Simpan aspirasi
     */
    public function store(Request $request)
    {
        try {

            // ================= VALIDASI =================
            $validated = $request->validate(
                [
                    'nama_pengirim' => 'required|string|max:255',
                    'email'         => 'required|email|ends_with:amikom.ac.id',
                    'isi_aspirasi'  => 'required|string|min:10',
                ],
                [
                    'nama_pengirim.required' => 'Nama wajib diisi',
                    'email.required'         => 'Email wajib diisi',
                    'email.email'            => 'Format email tidak valid',
                    'email.ends_with'        => 'Email harus menggunakan domain @amikom.ac.id',
                    'isi_aspirasi.required'  => 'Isi aspirasi wajib diisi',
                    'isi_aspirasi.min'       => 'Aspirasi minimal 10 karakter',
                ]
            );

            // ================= SIMPAN =================
            Aspirasi::create([
                'nama_pengirim' => trim($validated['nama_pengirim']),
                'email'         => strtolower(trim($validated['email'])),
                'isi_aspirasi'  => trim($validated['isi_aspirasi']),
                'status'        => 'baru',
            ]);

            // ================= RESPONSE =================
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Aspirasi berhasil dikirim. Terima kasih 🙏',
                ], 200);
            }

            return redirect()->back()
                ->with('success', 'Aspirasi berhasil dikirim');

        } catch (ValidationException $e) {

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'errors'  => $e->validator->errors(),
                    'message' => $e->validator->errors()->first(),
                ], 422);
            }

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    /**
     * ADMIN: Update status aspirasi
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $aspirasi->update([
            'status' => $request->status,
        ]);

        return redirect()->back()
            ->with('success', 'Status aspirasi diperbarui');
    }

    /**
     * ADMIN: Hapus aspirasi
     */
    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();

        return redirect()->back()
            ->with('success', 'Aspirasi berhasil dihapus');
    }
}
