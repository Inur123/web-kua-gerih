<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    // Tampilkan semua regulasi
    public function index()
    {
        $regulasis = Regulasi::where('status', 'active')->latest()->get();
        return view('user.regulasis.index', compact('regulasis'));
    }

    // Tampilkan detail regulasi
    public function show($slug)
    {
        $regulasi = Regulasi::where('slug', $slug)
            ->where('status', 'active')
            ->with('lampirans')
            ->firstOrFail();

        return view('user.regulasis.show', compact('regulasi'));
    }
}
