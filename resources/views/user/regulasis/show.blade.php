@extends('user.layouts.app')
@section('title', 'Detail Regulasi - ' . $regulasi->nama)

@section('content')
<main class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-6">

            <!-- Main Content (Detail Regulasi) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <!-- Judul Regulasi -->
                    <h1 class="text-2xl font-bold text-kemenag-green mb-4">{{ $regulasi->nama }}</h1>

                    <!-- Deskripsi -->
                    @if($regulasi->deskripsi)
                        <p class="text-gray-700 mb-6">{{ $regulasi->deskripsi }}</p>
                    @endif

                    <!-- Lampiran / Persyaratan -->
                    <h2 class="text-lg font-semibold text-kemenag-green mb-2">Lampiran / Persyaratan</h2>
                    @if($regulasi->lampirans->isEmpty())
                        <p class="text-gray-500 mb-6">Belum ada lampiran atau persyaratan untuk regulasi ini.</p>
                    @else
                        <ul class="list-disc pl-5 text-gray-700 space-y-2 mb-6">
                            @foreach($regulasi->lampirans as $lampiran)
                                <li>
                                    <span class="font-medium">{{ $lampiran->nama }}</span>
                                    @if($lampiran->link_download)
                                        - <a href="{{ $lampiran->link_download }}" class="text-blue-500 hover:underline" target="_blank">Download</a>
                                    @endif
                                    @if($lampiran->deskripsi)
                                        <p class="text-gray-500 text-sm mt-1">{{ $lampiran->deskripsi }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Tombol Kembali -->
                    <a href="{{ route('regulasi.index') }}" class="inline-block text-kemenag-green hover:underline">
                        ← Kembali ke daftar regulasi
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                @include('user.layouts.sidebar')
            </div>
        </div>
    </div>
</main>
@endsection
