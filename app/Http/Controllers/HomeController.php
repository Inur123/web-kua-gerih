<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Survey;
use App\Models\Layanan;
use App\Models\TotalLayanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags'])
            ->where('status', 'active')
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->latest()
            ->take(6)
            ->get();

        $banner = Banner::where('status', true)->first();
        $stat = [
            'total' => Survey::count(),
            'avg'   => Survey::avg('rating'),
            'most'  => Survey::select('rating')
                ->groupBy('rating')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(1)
                ->value('rating'),
            'chart' => Survey::selectRaw('rating, COUNT(*) as total')
                ->groupBy('rating')
                ->pluck('total', 'rating')
                ->toArray(),
        ];
        // Ambil tahun terbaru dari total_layanans
        $layanans = Layanan::all();
      $hit = TotalLayanan::with('layanan')
    ->orderByDesc('tanggal') // ambil yang terbaru dulu
    ->get()
    ->groupBy(fn($item) => $item->layanan->nama) // kelompokkan berdasarkan nama layanan
    ->map(fn($items) => [
        'total' => $items->first()->total,          // total terbaru
        'tanggal' => $items->first()->tanggal,      // tanggal terbaru
    ])
    ->toArray();

        return view('user.home', compact('posts', 'banner', 'stat', 'layanans', 'hit'));
    }
}
