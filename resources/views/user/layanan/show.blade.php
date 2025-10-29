@extends('user.layouts.app')
@section('title', 'Detail Layanan - ' . $layanan->nama)
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h1 class="text-2xl font-bold text-kemenag-green mb-4">{{ $layanan->nama }}</h1>
                        <p class="text-gray-700 mb-6">{{ $layanan->deskripsi }}</p>
                        @if ($layanan->persyaratans->isNotEmpty())
                            <h2 class="text-lg font-semibold text-kemenag-green mb-2">Persyaratan</h2>
                            <ul class="list-disc pl-5 text-gray-700 space-y-2 mb-6">
                                @foreach ($layanan->persyaratans as $persyaratan)
                                    <li>
                                        <span class="font-medium">{{ $persyaratan->nama }}</span>
                                        @if ($persyaratan->link_download)
                                            - <a href="{{ $persyaratan->link_download }}"
                                                class="text-blue-500 hover:underline" target="_blank">Link</a>
                                        @endif
                                        @if ($persyaratan->deskripsi)
                                            <div class="text-gray-500 text-sm mt-1">{!! $persyaratan->deskripsi !!}</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($layanan->syaratKhusus->isNotEmpty())
                            <h2 class="text-lg font-semibold text-kemenag-green mb-2">Syarat Khusus</h2>
                            <ul class="list-disc pl-5 text-gray-700 space-y-2 mb-6">
                                @foreach ($layanan->syaratKhusus as $syarat)
                                    <li>
                                        <span class="font-medium">{{ $syarat->nama }}</span>
                                        @if ($syarat->link_download)
                                            - <a href="{{ $syarat->link_download }}" class="text-blue-500 hover:underline"
                                                target="_blank">Download</a>
                                        @endif
                                        @if ($syarat->deskripsi)
                                            <div class="text-gray-500 text-sm mt-1">{!! $syarat->deskripsi !!}</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($layanan->prosedurs->isNotEmpty())
                            <h2 class="text-lg font-semibold text-kemenag-green mb-2">Prosedur</h2>
                            <ol class="list-decimal pl-5 text-gray-700 space-y-2 mb-6">
                                @foreach ($layanan->prosedurs as $step)
                                    <li>
                                        <span class="font-medium">{{ $step->nama }}</span>
                                        @if ($step->link_download)
                                            - <a href="{{ $step->link_download }}" class="text-blue-500 hover:underline"
                                                target="_blank">Download</a>
                                        @endif
                                        @if ($step->deskripsi)
                                            <div class="text-gray-500 text-sm mt-1">{!! $step->deskripsi !!}</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                        {{-- Gambar Layanan --}}
                        @if ($layanan->images->isNotEmpty())
                            <div class="mb-6">
                                <h2 class="text-lg font-semibold text-kemenag-green mb-3">Gambar Layanan</h2>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                    @foreach ($layanan->images as $img)
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar {{ $layanan->nama }}"
                                            class="cursor-pointer rounded shadow gallery-image hover:opacity-90 transition"
                                            onclick="openImageModal('{{ asset('storage/' . $img->image) }}')">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('layanan.index') }}"
                            class="bg-kemenag-green text-white px-4 py-2 rounded-lg hover:bg-kemenag-light-green transition-colors w-full sm:w-auto text-center">
                            ← Kembali ke Daftar Layanan
                        </a>

                    </div>
                </div>
                @include('user.layouts.sidebar')
            </div>
        </div>
    </main>
    {{-- Modal Preview Gambar --}}
    <div id="imageModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-50">
        <img id="modalImage" src="" class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg">
        <button onclick="closeImageModal()" class="absolute top-4 right-6 text-white text-3xl font-bold">&times;</button>
    </div>
    <script>
        function openImageModal(src) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            modalImage.src = src;
            modal.classList.remove('hidden');

            // Tambah event listener untuk klik di luar gambar
            modal.addEventListener('click', function handleOutsideClick(e) {
                if (e.target === modal) {
                    closeImageModal();
                    modal.removeEventListener('click', handleOutsideClick);
                }
            });
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
@endsection
