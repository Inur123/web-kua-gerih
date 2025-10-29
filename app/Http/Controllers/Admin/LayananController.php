<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\LayananImage;

class LayananController extends Controller
{

    public function index()
    {
        $layanans = Layanan::latest()->paginate(10);
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
            'icon' => 'nullable|string',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'status', 'icon']);
        $data['slug'] = Str::slug($request->nama);

        Layanan::create($data);

        return redirect()->route('layanans.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Form edit layanan
    public function edit(Layanan $layanan)
    {
        // load semua relasi
        $layanan->load(['persyaratans', 'syaratKhusus', 'prosedurs']);
        return view('admin.layanans.edit', compact('layanan'));
    }

    // Update layanan + relasi
   public function update(Request $request, Layanan $layanan)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'status' => 'required|in:active,inactive',
        'icon' => 'nullable|string',

        // Persyaratan
        'existing_persyaratan' => 'nullable|array',
        'new_persyaratan' => 'nullable|array',
        'delete_persyaratan' => 'nullable|array',

        // Syarat Khusus
        'existing_syarat_khusus' => 'nullable|array',
        'new_syarat_khusus' => 'nullable|array',
        'delete_syarat_khusus' => 'nullable|array',

        // Prosedur
        'existing_prosedur' => 'nullable|array',
        'new_prosedur' => 'nullable|array',
        'delete_prosedur' => 'nullable|array',

        // Tambahan: Multi Gambar
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'deleted_images' => 'nullable|string',
    ]);

    // Update data utama layanan
    $data = $request->only(['nama', 'deskripsi', 'status', 'icon']);
    $data['slug'] = Str::slug($request->nama);
    $layanan->update($data);

    /**
     * === Persyaratan ===
     */
    if ($request->has('existing_persyaratan')) {
        foreach ($request->existing_persyaratan as $id => $persyaratanData) {
            $layanan->persyaratans()->where('id', $id)->update($persyaratanData);
        }
    }
    if ($request->has('new_persyaratan')) {
        foreach ($request->new_persyaratan as $persyaratanData) {
            $layanan->persyaratans()->create($persyaratanData);
        }
    }
    if ($request->has('delete_persyaratan')) {
        $layanan->persyaratans()->whereIn('id', $request->delete_persyaratan)->delete();
    }

    /**
     * === Syarat Khusus ===
     */
    if ($request->has('existing_syarat_khusus')) {
        foreach ($request->existing_syarat_khusus as $id => $data) {
            $layanan->syaratKhusus()->where('id', $id)->update($data);
        }
    }
    if ($request->has('new_syarat_khusus')) {
        foreach ($request->new_syarat_khusus as $data) {
            $layanan->syaratKhusus()->create($data);
        }
    }
    if ($request->has('delete_syarat_khusus')) {
        $layanan->syaratKhusus()->whereIn('id', $request->delete_syarat_khusus)->delete();
    }

    /**
     * === Prosedur ===
     */
    if ($request->has('existing_prosedur')) {
        foreach ($request->existing_prosedur as $id => $data) {
            $layanan->prosedurs()->where('id', $id)->update($data);
        }
    }
    if ($request->has('new_prosedur')) {
        foreach ($request->new_prosedur as $data) {
            $layanan->prosedurs()->create($data);
        }
    }
    if ($request->has('delete_prosedur')) {
        $layanan->prosedurs()->whereIn('id', $request->delete_prosedur)->delete();
    }

    // Hapus gambar yang dipilih
    if ($request->deleted_images) {
        $deletedImageIds = explode(',', $request->deleted_images);
        foreach ($deletedImageIds as $imageId) {
            $image = LayananImage::find($imageId);
            if ($image) {
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
        }
    }

    // Tambah gambar baru
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $img) {
            $path = $img->store('layanan_images', 'public');
            LayananImage::create([
                'layanan_id' => $layanan->id,
                'image' => $path
            ]);
        }
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
    $layanan->load(['persyaratans', 'syaratKhusus', 'prosedurs','images']);
    return view('admin.layanans.show', compact('layanan'));
}
}
