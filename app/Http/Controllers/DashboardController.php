<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;
use App\Models\Kehadiran;

class DashboardController extends Controller
{
    public function index()
    {
        $kegiatanTerbaru = Kegiatan::latest()->first();

        $recentKegiatan = Kegiatan::withCount('kehadiran')
            ->latest()
            ->take(5)
            ->get();

        $chartLabels = Kegiatan::pluck('nama_kegiatan');

        $chartData = Kegiatan::withCount('kehadiran')
            ->get()
            ->pluck('kehadiran_count');

        return view('dashboard', [
            'totalKegiatan' => Kegiatan::count(),
            'kegiatanAktif' => Kegiatan::where('status', 'aktif')->count(),
            'totalKehadiran' => Kehadiran::count(),
            'totalPeserta' => Kehadiran::distinct('nama')->count(),

            'kegiatanTerbaru' => $kegiatanTerbaru,
            'recentKegiatan' => $recentKegiatan,

            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
        ]);
    }

    public function laporanKehadiran()
    {
        $kegiatan = Kegiatan::withCount('kehadiran')
            ->orderBy('tanggal_kegiatan', 'desc')
            ->get();

        return view('kehadiran.laporan', compact('kegiatan'));
    }

    public function peserta()
    {
        $peserta = Kehadiran::select(
                'nama',
                'jabatan',
                'tim',
                DB::raw('COUNT(*) as total_hadir')
            )
            ->groupBy('nama', 'jabatan', 'tim')
            ->orderByDesc('total_hadir')
            ->get();

        return view('kehadiran.peserta', compact('peserta'));
    }
}