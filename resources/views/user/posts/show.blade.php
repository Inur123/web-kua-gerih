@extends('user.layouts.app')

@section('title', $post->title . ' - KUA Gerih')

@section('meta')
    {{-- SEO META TAGS --}}
    <meta name="description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160, '...') }}">
    <meta name="keywords"
        content="{{ $post->tags->pluck('name')->implode(', ') }}, {{ $post->category->name ?? 'Berita' }} KUA Gerih, berita islam {{ $post->category->name ?? '' }}, informasi nikah {{ $post->tags->pluck('name')->implode(' ') }}, Kecamatan Gerih">

    {{-- Open Graph / Facebook / WhatsApp --}}
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160, '...') }}">
    <meta property="og:site_name" content="KUA Gerih">
    <meta property="og:locale" content="id_ID">

    {{-- Gambar untuk Open Graph --}}
    @php
        // Pastikan URL yang dihasilkan adalah URL absolut yang bisa diakses publik
        $thumbnailUrl = $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/logo-kua.png');
    @endphp
    <meta property="og:image" content="{{ $thumbnailUrl }}">
    <meta property="og:image:secure_url" content="{{ $thumbnailUrl }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    @if ($post->published_at)
        <meta property="article:published_time"
            content="{{ \Carbon\Carbon::parse($post->published_at)->toIso8601String() }}">
    @endif
    <meta property="article:section" content="{{ $post->category->name ?? 'Berita' }}">
    @foreach ($post->tags as $tag)
        <meta property="article:tag" content="{{ $tag->name }}">
    @endforeach

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 160, '...') }}">
    <meta name="twitter:image" content="{{ $thumbnailUrl }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">
@endsection


@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-3 gap-8">
                    {{-- Main Article --}}
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            @if ($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="w-full h-auto object-cover" loading="lazy">
                            @endif

                            <div class="p-6">
                                {{-- Category & Date --}}
                                <div class="flex items-center space-x-2 mb-3">
                                    <span
                                        class="bg-kemenag-green text-white px-3 py-1 rounded-full text-xs">{{ $post->category->name ?? 'BERITA' }}</span>
                                    @if ($post->published_at)
                                        <span
                                            class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}</span>
                                    @endif
                                </div>

                                {{-- Title --}}
                                <h1 class="text-3xl font-bold text-kemenag-green mb-4">{{ $post->title }}</h1>

                                {{-- Tags --}}
                                @if ($post->tags && $post->tags->count())
                                    <div class="mb-4 flex flex-wrap gap-2">
                                        @foreach ($post->tags as $tag)
                                            <span
                                                class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-700">#{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                {{-- Content --}}
                                <div class="prose max-w-none mb-6 text-gray-700">
                                    {!! $post->content !!}
                                </div>


                                {{-- Gallery --}}
                                @if ($post->images && $post->images->count())
                                    <div class="mb-6">
                                        <h4 class="font-semibold text-kemenag-green mb-3">Galeri Foto</h4>
                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                            @foreach ($post->images as $img)
                                                <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar Berita"
                                                    class="cursor-pointer rounded shadow gallery-image">
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div id="modal"
                                        class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-50 hidden">
                                        <button id="modal-close"
                                            class="absolute top-4 right-4 text-white text-3xl font-bold z-50 cursor-pointer">&times;</button>
                                        <img id="modal-img"
                                            class="max-h-[80vh] max-w-[80vw] w-auto h-auto rounded shadow-lg">
                                    </div>

                                    <script>
                                        const images = document.querySelectorAll('.gallery-image');
                                        const modal = document.getElementById('modal');
                                        const modalImg = document.getElementById('modal-img');
                                        const modalClose = document.getElementById('modal-close');

                                        images.forEach(img => {
                                            img.addEventListener('click', () => {
                                                modal.style.display = 'flex';
                                                modalImg.src = img.src;
                                            });
                                        });

                                        modalClose.addEventListener('click', () => {
                                            modal.style.display = 'none';
                                        });

                                        modal.addEventListener('click', (e) => {
                                            if (e.target === modal) modal.style.display = 'none';
                                        });
                                    </script>
                                @endif



                                {{-- WhatsApp Share --}}
                                <div class="mb-6 flex">
                                    <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank"
                                        class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-full inline-flex items-center">
                                        <i class="fa-brands fa-whatsapp mr-2" aria-hidden="true"></i>
                                        Bagikan via WhatsApp
                                    </a>
                                </div>


                                {{-- Back Link --}}
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

                    {{-- Sidebar --}}
                    @include('user.layouts.sidebar')
                </div>
            </div>
        </div>
    </main>
@endsection
