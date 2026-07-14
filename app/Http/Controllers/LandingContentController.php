<?php

namespace App\Http\Controllers;

use App\Models\LandingContent;
use Illuminate\Http\Request;

class LandingContentController extends Controller
{
    public function index()
    {
        $contents = LandingContent::latest()->get();

        return view('landing_content.index', compact('contents'));
    }

    public function create()
    {
        return view('landing_content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'icon' => 'nullable|max:255',
        ]);

        LandingContent::create($request->all());

        return redirect()
            ->route('landing-content.index')
            ->with('success', 'Content berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $content = LandingContent::findOrFail($id);

        return view('landing_content.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'icon' => 'nullable|max:255',
        ]);

        $content = LandingContent::findOrFail($id);

        $content->update($request->all());

        return redirect()
            ->route('landing-content.index')
            ->with('success', 'Content berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $content = LandingContent::findOrFail($id);

        $content->delete();

        return redirect()
            ->route('landing-content.index')
            ->with('success', 'Content berhasil dihapus.');
    }
}
