@extends('user.layouts.app')
@section('title', 'Layanan - Kua Gerih')
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Berita Terbaru</h1>

                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Main Content  -->
                    <div class="lg:col-span-2">
                        <!-- Featured News  -->
                        @if ($featuredPost)
                            <article
                                class="bg-white rounded-lg shadow-lg overflow-hidden mb-8 relative cursor-pointer group">
                                <img src="{{ asset('storage/' . $featuredPost->thumbnail) }}" alt="{{ $featuredPost->title }}"
                                    class="w-full h-full object-cover" loading="lazy">


                                <div class="p-6">
                                    <div class="flex items-center space-x-2 mb-3">
                                        <span
                                            class="bg-kemenag-green text-white px-3 py-1 rounded-full text-xs">UTAMA</span>
                                        <span class="text-gray-500 text-sm">
                                            {{ $featuredPost->created_at->format('d F Y') }}
                                        </span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-kemenag-green mb-3">{{ $featuredPost->title }}</h2>
                                    <p class="text-gray-700 mb-4">{{ Str::limit($featuredPost->content, 150) }}</p>
                                    <span class="text-kemenag-green font-semibold group-hover:underline">
                                        Baca Selengkapnya →
                                    </span>
                                </div>

                                <!-- Ini link overlay, selalu paling akhir di dalam article -->
                                <a href="{{ route('berita.show', $featuredPost->slug) }}" class="absolute inset-0 z-50"></a>
                            </article>
                        @endif


                        <div class="space-y-6">
                            @foreach ($otherPosts as $post)
                                <article
                                    class="bg-white rounded-lg shadow-lg overflow-hidden mb-6 relative cursor-pointer group">
                                    <div class="md:flex">
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                            class="w-full md:w-48 h-48 md:h-auto object-cover">
                                        <div class="p-6 flex-1">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">
                                                    {{ $post->category->name ?? 'KEGIATAN' }}
                                                </span>
                                                <span class="text-gray-500 text-sm">
                                                    {{ $post->created_at->format('d F Y') }}
                                                </span>
                                            </div>
                                            <h3 class="text-xl font-bold text-kemenag-green mb-2">{{ $post->title }}</h3>
                                            <p class="text-gray-700 mb-3">{{ Str::limit($post->content, 100) }}</p>
                                            <span class="text-kemenag-green font-semibold group-hover:underline">
                                                Baca Selengkapnya →
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Overlay link -->
                                    <a href="{{ route('berita.show', $post->slug) }}" class="absolute inset-0 z-50"></a>
                                </article>
                            @endforeach

                        </div>

                        <!-- Pagination  -->
                        @if ($otherPosts->hasPages())
                            <div class="flex justify-center mt-8">
                                <nav class="flex space-x-2">
                                    {{-- Previous Page Link --}}
                                    @if ($otherPosts->onFirstPage())
                                        <span class="px-3 py-2 bg-gray-200 text-gray-400 rounded cursor-not-allowed">‹
                                            Prev</span>
                                    @else
                                        <a href="{{ $otherPosts->previousPageUrl() }}"
                                            class="px-3 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300">‹ Prev</a>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($otherPosts->getUrlRange(1, $otherPosts->lastPage()) as $page => $url)
                                        @if ($page == $otherPosts->currentPage())
                                            <span
                                                class="px-3 py-2 bg-kemenag-green text-white rounded">{{ $page }}</span>
                                        @else
                                            <a href="{{ $url }}"
                                                class="px-3 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300">{{ $page }}</a>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($otherPosts->hasMorePages())
                                        <a href="{{ $otherPosts->nextPageUrl() }}"
                                            class="px-3 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300">Next ›</a>
                                    @else
                                        <span class="px-3 py-2 bg-gray-200 text-gray-400 rounded cursor-not-allowed">Next
                                            ›</span>
                                    @endif
                                </nav>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar  -->
                    <div class="lg:col-span-1">
                        <!-- Search  -->
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

                        <!-- Categories  -->
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


                        <!-- Recent News  -->
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
