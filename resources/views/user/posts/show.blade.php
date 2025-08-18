@extends('user.layouts.app')
@section('title', $post->title . ' - Kua Gerih')
@section('content')
 <meta name="description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160, '...') }}">
    <meta name="keywords"
        content="
    {{ $post->tags->pluck('name')->implode(', ') }},
    {{ $post->category->name ?? 'Berita' }} KUA Gerih,
    berita islam {{ $post->category->name ?? '' }},
    informasi nikah {{ $post->tags->pluck('name')->implode(' ') }},
    Kecamatan Gerih
">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $post->title }} - Kua Gerih">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160, '...') }}">
    <meta property="og:image"
        content="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/logo-kua.png') }}">
    <meta property="og:site_name" content="Kua Gerih">
    <meta property="og:locale" content="id_ID">
    @if ($post->published_at)
        <meta property="article:published_time"
            content="{{ \Carbon\Carbon::parse($post->published_at)->toIso8601String() }}">
    @endif
    <meta property="article:section" content="{{ $post->category->name ?? 'Berita' }}">
    @foreach ($post->tags as $tag)
        <meta property="article:tag" content="{{ $tag->name }}">
    @endforeach

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }} - Kua Gerih">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160, '...') }}">
    <meta name="twitter:image"
        content="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/logo-kua.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">


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
                                    class="text-gray-500 text-sm">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') : '' }}</span>
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
                                {!! $post->content !!}
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

                            <!-- WhatsApp Share Button -->
                            <div class="mb-6 flex">
                                <a href="https://wa.me/?text={{ urlencode($post->title . ' - Baca selengkapnya: ' . url()->current()) }}"
                                    target="_blank"
                                    class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-full inline-flex items-center">
                                    <i class="fa-brands fa-whatsapp mr-2" aria-hidden="true"></i>
                                    Bagikan via WhatsApp
                                </a>
                            </div>
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
                @include('user.layouts.sidebar')
            </div>
        </div>
    </div>
</main>

@endsection
