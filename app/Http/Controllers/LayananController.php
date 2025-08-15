<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
{
    $layanans = Layanan::where('status', 'active')->get();
    return view('user.layanan.index', compact('layanans'));
}

    public function show($slug)
{
    $layanan = Layanan::where('slug', $slug)->where('status', 'active')->firstOrFail();
    return view('user.layanan.show', compact('layanan'));
}

}
