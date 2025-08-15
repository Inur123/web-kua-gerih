<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    // Menampilkan semua layanan (dashboard)
    public function index()
    {
        $layanans = Layanan::all();
        return view('admin.layanans.index', compact('layanans'));
    }

    // Form tambah layanan
    public function create()
    {
        return view('admin.layanans.create');
    }

    // Simpan layanan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['nama','deskripsi','status']);
        $data['slug'] = Str::slug($request->nama);

        Layanan::create($data);

        return redirect()->route('layanans.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Form edit layanan
    public function edit(Layanan $layanan)
    {
        $layanan->load('persyaratans'); // load relasi persyaratan
        return view('admin.layanans.edit', compact('layanan'));
    }

    // Update layanan + persyaratan
  public function update(Request $request, Layanan $layanan)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'status' => 'required|in:active,inactive',
        'existing_persyaratan' => 'nullable|array',
        'new_persyaratan' => 'nullable|array',
        'delete_persyaratan' => 'nullable|array',
    ]);

    // Update layanan data
    $data = $request->only(['nama', 'deskripsi', 'status']);
    $data['slug'] = Str::slug($request->nama);
    $layanan->update($data);

    // Handle existing persyaratan updates
    if ($request->has('existing_persyaratan')) {
        foreach ($request->existing_persyaratan as $id => $persyaratanData) {
            $layanan->persyaratans()->where('id', $id)->update($persyaratanData);
        }
    }

    // Handle new persyaratan
    if ($request->has('new_persyaratan')) {
        foreach ($request->new_persyaratan as $persyaratanData) {
            $layanan->persyaratans()->create($persyaratanData);
        }
    }

    // Handle deletions
    if ($request->has('delete_persyaratan')) {
        $layanan->persyaratans()->whereIn('id', $request->delete_persyaratan)->delete();
    }

    return redirect()->route('layanans.index')->with('success', 'Layanan berhasil diupdate!');
}
    // Hapus layanan
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('layanans.index')->with('success', 'Layanan berhasil dihapus!');
    }

    //show detail layanan
    public function show(Layanan $layanan)
    {
        $layanan->load('persyaratans'); // load relasi persyaratan
        return view('admin.layanans.show', compact('layanan'));
    }
}
