<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TotalLayanan;
use App\Models\Layanan;

class TotalLayananController extends Controller
{
    public function index()
    {
        $totalLayanans = TotalLayanan::with('layanan')->orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.total_layanan.index', compact('totalLayanans'));
    }


    public function create()
    {
        $layanans = Layanan::all();
        return view('admin.total_layanan.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'tanggal' => 'required|date',
            'total' => 'required|integer|min:0'
        ]);

        TotalLayanan::create($request->all());

        return redirect()->route('total-layanan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(TotalLayanan $totalLayanan)
    {
        $layanans = Layanan::all();
        return view('admin.total_layanan.edit', compact('totalLayanan', 'layanans'));
    }

    public function update(Request $request, TotalLayanan $totalLayanan)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'tanggal' => 'required|date',
            'total' => 'required|integer|min:0'
        ]);

        $totalLayanan->update($request->all());

        return redirect()->route('total-layanan.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(TotalLayanan $totalLayanan)
    {
        $totalLayanan->delete();
        return redirect()->route('total-layanan.index')->with('success', 'Data berhasil dihapus');
    }
}
