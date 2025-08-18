<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
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

        return view('user.home', compact('posts', 'banner'));
    }

}
