@extends('user.layouts.app')
@section('title', 'Layanan - Kua Gerih')
@section('content')
<main class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Layanan KUA</h1>
            <div class="grid md:grid-cols-3 gap-3">
                <a href="" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow block">
                    <h2 class="text-xl font-bold text-kemenag-green mb-2">Layanan Nikah</h2>
                    <p class="text-gray-700">Pendaftaran dan pencatatan pernikahan.</p>
                </a>
                <a href="" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow block">
                    <h2 class="text-xl font-bold text-kemenag-green mb-2">Layanan Rujuk</h2>
                    <p class="text-gray-700">Pencatatan rujuk pasangan suami istri.</p>
                </a>
                <a href="" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow block">
                    <h2 class="text-xl font-bold text-kemenag-green mb-2">Layanan Wakaf</h2>
                    <p class="text-gray-700">Pengelolaan dan administrasi wakaf.</p>
                </a>
                <a href="" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow block">
                    <h2 class="text-xl font-bold text-kemenag-green mb-2">Bimbingan Haji & Umrah</h2>
                    <p class="text-gray-700">Pembinaan dan konsultasi haji umrah.</p>
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
