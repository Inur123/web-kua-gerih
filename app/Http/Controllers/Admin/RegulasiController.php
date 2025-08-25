<?php

namespace App\Http\Controllers\Admin;

use App\Models\Regulasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class RegulasiController extends Controller
{
    // Menampilkan semua regulasi
    public function index()
    {
        $regulasis = Regulasi::all();
        return view('admin.regulasis.index', compact('regulasis'));
    }

    // Form tambah regulasi
    public function create()
    {
        return view('admin.regulasis.create');
    }

    // Simpan regulasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'status']);
        $data['slug'] = Str::slug($request->nama);

        Regulasi::create($data);

        return redirect()->route('regulasis.index')->with('success', 'Regulasi berhasil ditambahkan!');
    }

    // Form edit regulasi
    public function edit(Regulasi $regulasi)
    {
        $regulasi->load('lampirans');
        return view('admin.regulasis.edit', compact('regulasi'));
    }

    // Update regulasi + lampiran
    public function update(Request $request, Regulasi $regulasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:active,inactive',

            // Lampiran
            'existing_lampiran' => 'nullable|array',
            'new_lampiran' => 'nullable|array',
            'delete_lampiran' => 'nullable|array',
        ]);

        // Update data regulasi
        $data = $request->only(['nama', 'deskripsi', 'status']);
        $data['slug'] = Str::slug($request->nama);
        $regulasi->update($data);

        // Lampiran
        if ($request->has('existing_lampiran')) {
            foreach ($request->existing_lampiran as $id => $lampiranData) {
                $regulasi->lampirans()->where('id', $id)->update($lampiranData);
            }
        }
        if ($request->has('new_lampiran')) {
            foreach ($request->new_lampiran as $lampiranData) {
                $regulasi->lampirans()->create($lampiranData);
            }
        }
        if ($request->has('delete_lampiran')) {
            $regulasi->lampirans()->whereIn('id', $request->delete_lampiran)->delete();
        }

        return redirect()->route('regulasis.index')->with('success', 'Regulasi berhasil diupdate!');
    }

    // Hapus regulasi
    public function destroy(Regulasi $regulasi)
    {
        $regulasi->delete();
        return redirect()->route('regulasis.index')->with('success', 'Regulasi berhasil dihapus!');
    }

    // Detail regulasi
    public function show(Regulasi $regulasi)
    {
        $regulasi->load('lampirans');
        return view('admin.regulasis.show', compact('regulasi'));
    }
}
