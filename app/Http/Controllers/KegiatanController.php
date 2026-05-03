<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->paginate(10);
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    // ✅ FIX STORE (NO DB::TABLE)
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'waktu_mulai' => 'required',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_kegiatan' => Carbon::parse($request->tanggal_kegiatan)->toDateString(),
            'waktu_mulai' => $request->waktu_mulai,
            'status' => 'aktif',
            'token_link' => Str::random(10),
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'waktu_mulai' => 'required',
            'status' => 'required',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_kegiatan' => Carbon::parse($request->tanggal_kegiatan)->toDateString(),
            'waktu_mulai' => $request->waktu_mulai,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil diupdate');
    }

    public function destroy($id)
    {
        Kegiatan::findOrFail($id)->delete();

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with('kehadiran')->findOrFail($id);

        return view('kegiatan.show', compact('kegiatan'));
    }
}