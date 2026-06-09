<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;

class DashboardController extends Controller
{
    public function index()
    {
        $kegiatanTerbaru = Kegiatan::latest()->first();

        $recentKegiatan = Kegiatan::latest()
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
}