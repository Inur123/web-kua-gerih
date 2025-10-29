<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\TotalView;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   public function boot(): void
{
    View::composer([
        'user.*',
    ], function ($view) {
        $categories = Category::withCount('posts')->get();
        $popularPosts = Post::orderByDesc('views')->take(5)->get();
        $tags = Tag::all(); // ambil semua tag
        $view->with(compact('categories', 'popularPosts', 'tags'));
    });

     View::composer('*', function ($view) {
        $totalViews = TotalView::sum('count') ?? 0;
        $view->with('totalViews', $totalViews);
    });

    Carbon::setLocale('id');
    CarbonInterval::setLocale('id');
}
}
