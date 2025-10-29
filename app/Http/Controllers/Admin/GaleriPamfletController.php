<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriPamflet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriPamfletController extends Controller
{
    public function index()
    {
        $galeriPamflets = GaleriPamflet::latest()->paginate(10);
        return view('admin.galeri_pamflet.index', compact('galeriPamflets'));
    }

    public function create()
    {
        return view('admin.galeri_pamflet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'tanggal' => 'required|date',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeri_pamflet', 'public');
        }

        GaleriPamflet::create($data);

        return redirect()->route('galeri_pamflet.index')->with('success', 'Galeri Pamflet berhasil ditambahkan!');
    }

    public function edit(GaleriPamflet $galeriPamflet)
    {
        return view('admin.galeri_pamflet.edit', compact('galeriPamflet'));
    }

    public function update(Request $request, GaleriPamflet $galeriPamflet)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($galeriPamflet->gambar && Storage::disk('public')->exists($galeriPamflet->gambar)) {
                Storage::disk('public')->delete($galeriPamflet->gambar);
            }
            // Simpan file baru
            $data['gambar'] = $request->file('gambar')->store('galeri_pamflet', 'public');
        }

        $galeriPamflet->update($data);

        return redirect()->route('galeri_pamflet.index')->with('success', 'Galeri Pamflet berhasil diperbarui!');
    }

    public function destroy(GaleriPamflet $galeriPamflet)
    {
        // Hapus file gambar dulu jika ada
        if ($galeriPamflet->gambar && Storage::disk('public')->exists($galeriPamflet->gambar)) {
            Storage::disk('public')->delete($galeriPamflet->gambar);
        }

        // Hapus record database
        $galeriPamflet->delete();

        return redirect()->route('galeri_pamflet.index')->with('success', 'Galeri Pamflet berhasil dihapus!');
    }
}
