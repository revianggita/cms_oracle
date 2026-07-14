<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;
use App\Models\LandingContent;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing', [

            'totalKegiatan' => Kegiatan::count(),

            'totalKehadiran' => Kehadiran::count(),

            'totalPeserta' => Kehadiran::distinct('nama')->count(),

            'contents' => LandingContent::where('status', 'aktif')
                ->orderBy('urutan')
                ->get(),

        ]);
    }
}
