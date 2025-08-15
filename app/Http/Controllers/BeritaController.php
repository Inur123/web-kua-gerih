<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Get the latest featured post (utama)
        $featuredPost = Post::with(['category', 'tags'])
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->first();

        // Get other posts excluding the featured one
        $otherPosts = Post::with(['category', 'tags'])
            ->where('status', 'active')
            ->where('id', '!=', $featuredPost->id ?? null)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        // Get categories with post count
        $categories = Category::withCount(['posts' => function ($query) {
            $query->where('status', 'active');
        }])->get();
          $popularPosts = Post::where('status', 'active')
        ->orderBy('views', 'desc')
        ->take(5)
        ->get();

        return view('user.posts.index', compact('featuredPost', 'otherPosts', 'categories', 'popularPosts'));
    }


  public function show($slug)
{
    $post = Post::with(['category', 'tags'])
        ->where('slug', $slug)
        ->where('status', 'active')
        ->firstOrFail();

    // Tambah view count
    $post->increment('views');

    // Ambil kategori
    $categories = Category::withCount(['posts' => function ($query) {
        $query->where('status', 'active');
    }])->get();

    // Ambil 5 berita terpopuler (views terbanyak)
    $popularPosts = Post::where('status', 'active')
        ->orderBy('views', 'desc')
        ->take(5)
        ->get();

    return view('user.posts.show', compact('post', 'categories', 'popularPosts'));
}

}
