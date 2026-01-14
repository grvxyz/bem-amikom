<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaAcara;
use App\Models\Aspirasi;
use App\Models\Event;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // filter periode
        $start = $request->start_date ?? Carbon::now()->startOfMonth();
        $end   = $request->end_date ?? Carbon::now()->endOfMonth();

        // statistik
        $totalBerita = BeritaAcara::whereBetween('created_at', [$start, $end])->count();
        $totalAspirasi = Aspirasi::whereBetween('created_at', [$start, $end])->count();

        // 5 aspirasi terbaru
        $latestAspirasi = Aspirasi::latest()->limit(5)->get();

        // event aktif (hari ini di antara tanggal_mulai & tanggal_selesai)
        $today = Carbon::today();
        $activeEvents = Event::whereDate('tanggal_mulai', '<=', $today)
            ->whereDate('tanggal_selesai', '>=', $today)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalBerita',
            'totalAspirasi',
            'latestAspirasi',
            'activeEvents',
            'start',
            'end'
        ));
    }
}
