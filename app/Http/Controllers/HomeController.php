<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Survey;
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


        return view('user.home', compact('posts', 'banner', 'stat'));
    }

}
