<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = BeritaAcara::with('user')
            ->where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('public.berita.index', compact('berita'));
    }

    public function search(Request $request)
    {
        $keyword = $request->q;

        $berita = BeritaAcara::with('user')
            ->where('is_active', true)
            ->when($keyword, function ($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('isi', 'like', "%{$keyword}%");
            })
            ->latest()
            ->get();

        // RETURN HTML PARTIAL
        return view('public.berita._list', compact('berita'))->render();
    }

  public function detail($slug)
{
    $berita = BeritaAcara::where('slug', $slug)->firstOrFail();

    return view('public.berita.detail', compact('berita'));
}

}
