<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Category;
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
    $view->with(compact('categories', 'popularPosts'));
});
    }
}
