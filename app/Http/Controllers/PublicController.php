<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\BeritaAcara;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        // Event aktif (untuk hero slider)
        $events = Event::whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        // Berita terbaru
        $berita = BeritaAcara::latest()->take(5)->get();

        return view('public.home', compact('events', 'berita'));
    }

    public function storeAspirasi(Request $request)
    {
        $validated = $request->validate([
            'nama_pengirim' => 'required|string|max:100',
            'email'         => [
                'required',
                'email',
                'regex:/@(students\.amikom\.ac\.id|amikom\.ac\.id)$/'
            ],
            'isi_aspirasi'  => 'required|string',
        ], [
            'email.regex' => 'Gunakan email @students.amikom.ac.id atau @amikom.ac.id'
        ]);

        Aspirasi::create($validated);

        return back()->with('success', 'Aspirasi berhasil dikirim');
    }
}
