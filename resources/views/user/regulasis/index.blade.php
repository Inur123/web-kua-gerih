@extends('user.layouts.app')
@section('title', 'Regulasi - Kua Gerih')
@section('content')
<main class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Regulasi KUA</h1>
            <div class="grid md:grid-cols-3 gap-3">
                @foreach($regulasis as $regulasi)
                    <a href="{{ route('regulasi.show', $regulasi->slug) }}" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow block">
                        <h2 class="text-xl font-bold text-kemenag-green mb-2">{{ $regulasi->nama }}</h2>
                        <p class="text-gray-700">{{ $regulasi->deskripsi }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection
