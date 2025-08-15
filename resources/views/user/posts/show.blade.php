@extends('user.layouts.app')
@section('title', $post->title . ' - Kua Gerih')
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            @if ($post->thumbnail)
                                <div class="w-full aspect-[16/9] overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover" loading="lazy">
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center space-x-2 mb-3">
                                    <span
                                        class="bg-kemenag-green text-white px-3 py-1 rounded-full text-xs">{{ $post->category->name ?? 'BERITA' }}</span>
                                    <span
                                        class="text-gray-500 text-sm">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d F Y') : '' }}</span>
                                </div>
                                <h1 class="text-3xl font-bold text-kemenag-green mb-4">{{ $post->title }}</h1>

                                @if ($post->tags && $post->tags->count())
                                    <div class="mb-4 flex flex-wrap gap-2">
                                        @foreach ($post->tags as $tag)
                                            <span
                                                class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-700">#{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="prose max-w-none mb-6 text-gray-700">
                                    {!! nl2br(e($post->content)) !!}
                                </div>

                                @if ($post->images && $post->images->count())
                                    <div class="mb-6">
                                        <h4 class="font-semibold text-kemenag-green mb-3">Galeri Foto</h4>
                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                            @foreach ($post->images as $img)
                                                <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar Berita"
                                                    class="w-full h-32 object-cover rounded shadow">
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <a href="{{ route('berita.index') }}"
                                    class="inline-flex items-center text-kemenag-green font-semibold hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kembali ke Berita
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <!-- Search -->
                        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                            <h3 class="font-bold text-kemenag-green mb-4">Cari Berita</h3>
                            <div class="flex">
                                <input type="text" placeholder="Kata kunci..."
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-l focus:outline-none focus:border-kemenag-green">
                                <button
                                    class="bg-kemenag-green text-white px-4 py-2 rounded-r hover:bg-kemenag-light-green">
                                    🔍
                                </button>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                            <h3 class="font-bold text-kemenag-green mb-4">Kategori</h3>
                            <ul class="space-y-2 text-sm">
                                <li>
                                    <a href="" class="text-gray-700 hover:text-kemenag-green">
                                        Semua Berita ({{ $categories->sum('posts_count') }})
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="" class="text-gray-700 hover:text-kemenag-green">
                                            {{ $category->name }} ({{ $category->posts_count }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <!-- Recent News -->
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="font-bold text-kemenag-green mb-4">Berita Terpopuler</h3>
                            <div class="space-y-4">
                                @foreach ($popularPosts as $popular)
                                    <article class="flex space-x-3">
                                        <img src="{{ $popular->thumbnail ? asset('storage/' . $popular->thumbnail) : asset('images/gambar-kua.png') }}"
                                            alt="{{ $popular->title }}" class="w-20 h-15 object-cover rounded">
                                        <div class="flex-1">
                                            <h4 class="text-sm font-semibold text-gray-800 mb-1">
                                                <a href="{{ route('berita.show', $popular->slug) }}"
                                                    class="hover:underline">
                                                    {{ $popular->title }}
                                                </a>
                                            </h4>
                                            <p class="text-xs text-gray-500">{{ $popular->views }} views</p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
