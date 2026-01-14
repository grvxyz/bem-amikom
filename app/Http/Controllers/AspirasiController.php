<?php
namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $data = Aspirasi::latest()->paginate(10);
        return view('admin.aspirasi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'email' => 'nullable|email',
            'isi_aspirasi' => 'required'
        ]);

        Aspirasi::create([
            'nama_pengirim' => $request->nama_pengirim,
            'email' => $request->email,
            'isi_aspirasi' => $request->isi_aspirasi,
            'status' => 'baru'
        ]);

        return redirect()->back()->with('success', 'Aspirasi berhasil dikirim');
    }

    public function update(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai'
        ]);

        $aspirasi->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status aspirasi diperbarui');
    }

    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        return redirect()->back()->with('success', 'Aspirasi dihapus');
    }
}
