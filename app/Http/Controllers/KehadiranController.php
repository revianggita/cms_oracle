<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    // tampil form absensi dari token link
    public function show($token)
    {
        $kegiatan = Kegiatan::where('token_link', $token)
            ->firstOrFail();

        // kalau kegiatan ditutup
        if ($kegiatan->status == 'nonaktif') {
            return "Absensi sudah ditutup";
        }

        return view('kehadiran.form', compact('kegiatan'));
    }


    // simpan absensi user
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tim' => 'required|string|max:255',
            'tanda_tangan' => 'required',
        ]);

        Kehadiran::create([
            'kegiatan_id' => $request->kegiatan_id,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tim' => $request->tim,
            'tanda_tangan' => $request->tanda_tangan,
            'waktu_absen' => now(),
        ]);

        return back()->with(
            'success',
            'Absensi berhasil dikirim'
        );
    }
}