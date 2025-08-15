@extends('user.layouts.app')
@section('title', 'Detail Layanan - Kua Gerih')
@section('content')
<main class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold text-kemenag-green mb-4">Layanan Nikah</h1>
            <p class="text-gray-700 mb-6">Pendaftaran dan pencatatan pernikahan.</p>
            <h2 class="text-lg font-semibold text-kemenag-green mb-2">Syarat-syarat:</h2>
            <ul class="list-disc pl-5 text-gray-700 space-y-2 mb-6">
                <li>Fotokopi KTP calon pengantin</li>
                <li>Fotokopi KK calon pengantin</li>
                <li>Surat pengantar RT/RW</li>
                <li>Pas foto 2x3 dan 4x6 masing-masing 2 lembar</li>
                <li>Surat izin orang tua (jika di bawah umur)</li>
                <li>Akta cerai (jika pernah menikah sebelumnya)</li>
            </ul>
            <a href="{{ route('user.layanan.index') }}" class="inline-block text-kemenag-green hover:underline">← Kembali ke daftar layanan</a>
        </div>
    </div>
</main>
@endsection
