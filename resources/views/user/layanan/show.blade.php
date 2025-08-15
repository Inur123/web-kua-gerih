@extends('user.layouts.app')
@section('title', 'Detail Layanan - ' . $layanan->nama)
@section('content')
<main class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Main Content (Detail Layanan) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h1 class="text-2xl font-bold text-kemenag-green mb-4">{{ $layanan->nama }}</h1>
                    <p class="text-gray-700 mb-6">{{ $layanan->deskripsi }}</p>

                    <h2 class="text-lg font-semibold text-kemenag-green mb-2">Syarat-syarat:</h2>
                    @if($layanan->persyaratans->isEmpty())
                        <p class="text-gray-500">Belum ada persyaratan untuk layanan ini.</p>
                    @else
                        <ul class="list-disc pl-5 text-gray-700 space-y-1 mb-6">
                            @foreach($layanan->persyaratans as $persyaratan)
                                <li>
                                    <span class="font-medium">{{ $persyaratan->nama }}</span>
                                    @if($persyaratan->link_download)
                                        - <a href="{{ $persyaratan->link_download }}" class="text-blue-500 over:underline" target="_blank">Download</a>
                                    @endif
                                    @if($persyaratan->deskripsi)
                                        <p class="text-gray-500 text-sm mt-1">{{ $persyaratan->deskripsi }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('layanan.index') }}" class="inline-block text-kemenag-green hover:underline">← Kembali ke daftar layanan</a>
                </div>
            </div>

            <!-- Sidebar -->
            @include('user.layouts.sidebar')
        </div>
    </div>
</main>
@endsection
