@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm mb-8">
    <h2 class="font-bold text-2xl mb-2">{{ $post->title }}</h2>
    <div class="mb-2 text-sm text-gray-500">
        <span>Kategori: {{ $post->category->name ?? '-' }}</span> |
        <span>Status: <span class="font-semibold">{{ ucfirst($post->status) }}</span></span> |
        <span>Publikasi: {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') : '-' }}</span>
    </div>
   <div class="mb-4">
    <div class="flex flex-wrap gap-2">
        @foreach($post->tags as $tag)
            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">
                {{ $tag->name }}
            </span>
        @endforeach
    </div>
</div>
    @if($post->thumbnail)
        <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="Thumbnail" class="mb-4 rounded shadow h-48 object-cover">
    @endif
   <div class="prose max-w-none mb-4">
    {!! nl2br(strip_tags($post->content)) !!}
</div>

    @if($post->images->count())
        <div class="mb-4">
            <h4 class="font-semibold mb-2">Gambar Lain:</h4>
            <div class="flex flex-wrap gap-2">
                @foreach($post->images as $img)
                    <img src="{{ asset('storage/'.$img->image) }}" alt="Gambar" class="h-24 rounded shadow">
                @endforeach
            </div>
        </div>
    @endif
    <a href="{{ route('posts.index') }}" class="inline-block mt-4 text-kemenag-green hover:underline">Kembali ke daftar</a>
</div>
@endsection
