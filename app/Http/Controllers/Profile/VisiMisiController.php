<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        return view('user.visi-misi');
    }
}
