<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\BeritaAcara;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PublicController extends Controller
{
    /**
     * HALAMAN HOME
     */
    public function index()
    {
        // Event aktif (hero slider)
        $events = Event::whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        // Berita terbaru
        $berita = BeritaAcara::latest()->take(5)->get();

        return view('public.home', compact('events', 'berita'));
    }

    /**
     * HALAMAN TENTANG KAMI
     */
    public function tentangKami()
    {
        return view('public.tentang-kami');
    }

    /**
     * STORE ASPIRASI (AJAX)
     */
    public function storeAspirasi(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_pengirim' => 'required|string|max:100',
                'email' => [
                    'required',
                    'email',
                    'regex:/@(students\.amikom\.ac\.id|amikom\.ac\.id)$/'
                ],
                'isi_aspirasi' => 'required|string|min:5',
            ], [
                'email.regex' =>
                    'Gunakan email @students.amikom.ac.id atau @amikom.ac.id'
            ]);

            Aspirasi::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Aspirasi berhasil dikirim. Terima kasih 🙏'
            ], 200);

        } catch (ValidationException $e) {

            return response()->json([
                'status' => 'error',
                'message' => $e->validator->errors()->first()
            ], 422);
        }
    }
}
    