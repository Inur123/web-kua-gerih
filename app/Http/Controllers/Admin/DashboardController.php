<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Bisa ambil data untuk ditampilkan di dashboard
        return view('admin.dashboard');
    }
}
