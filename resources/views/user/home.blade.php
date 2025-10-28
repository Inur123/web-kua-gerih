@extends('user.layouts.app')
@section('title', 'Beranda - Kua Gerih')
@section('content')
    <style>
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .popup-container {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .popup-image-only {
            max-width: 100%;
            max-height: 90vh;
            border-radius: 8px;
            transform: scale(0.9);
            transition: transform 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            display: block;
        }

        .popup-overlay.active .popup-image-only {
            transform: scale(1);
        }

        .image-close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            transition: all 0.2s ease;
        }

        .image-close-btn:hover {
            background-color: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }
    </style>
    <section
        class="hero-section relative bg-gradient-to-r from-kemenag-green to-kemenag-light-green text-white py-12 md:py-16 lg:py-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="text-center md:text-left">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">
                        KUA Gerih – Integritas Pelayanan untuk Maslahat Umat
                    </h2>
                    <p class="text-base md:text-lg mb-6">
                        Kantor Urusan Agama siap melayani kebutuhan administrasi keagamaan masyarakat dengan profesional dan
                        terpercaya.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="{{ route('layanan.index') }}"
                            class="bg-kemenag-gold text-kemenag-green px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition-colors">
                            <i class="fas fa-laptop mr-2"></i>Layanan Online
                        </a>
                        <a href="{{ route('kontak.index') }}"
                            class="border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-kemenag-green transition-colors">
                            <i class="fas fa-phone mr-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="{{ asset('images/foto-depan.png') }}" alt="KUA Hero Image"
                        class="w-full h-auto rounded-lg shadow-lg" />
                </div>
            </div>
    </section>

    <!-- Quick Services -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl md:text-3xl font-bold text-center text-kemenag-green mb-8 md:mb-12">
                Layanan Utama
            </h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach ($layanans as $layanan)
                    <a href="{{ route('layanan.show', $layanan->slug) }}"
                        class="text-center p-6 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow hover:border-kemenag-light-green block">

                        <div
                            class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            @if ($layanan->icon)
                                {!! str_replace('<svg', '<svg class="w-6 h-6 md:w-7 md:h-7"', $layanan->icon) !!}
                            @else
                                <i class="fas fa-ring text-2xl md:text-3xl"></i>
                            @endif
                        </div>

                        <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                            {{ $layanan->nama }}
                        </h4>
                        <p class="text-xs md:text-sm text-gray-600">
                            {{ $layanan->deskripsi ?? '-' }}
                        </p>
                    </a>
                @endforeach
            </div>

        </div>
    </section>


    <!-- News & Features Section -->
    <section class="py-12 md:py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8 md:mb-12">
                <h3 class="text-2xl md:text-3xl font-bold text-kemenag-green mb-4">
                    Berita & Pengumuman Terbaru
                </h3>
                <p class="text-gray-600 text-sm md:text-base">
                    Ikuti perkembangan terbaru dan informasi penting dari KUA
                </p>
            </div>

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($posts as $post)
                    <a href="{{ route('berita.show', $post->slug) }}">
                        <article class="bg-white p-4 md:p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-2 py-1 rounded-full">
                                    {{ $post->category->name }}
                                </span>
                                <span class="text-xs text-gray-500 ml-auto">
                                    {{ $post->published_at
                                        ? $post->published_at->translatedFormat('d F Y')
                                        : $post->created_at->translatedFormat('d F Y') }}
                                </span>

                            </div>
                            <div class="h-48 md:h-56 rounded-lg mb-4 overflow-hidden">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                                {{ Str::limit($post->title, 40) }}
                            </h4>
                            <p class="text-xs md:text-sm text-gray-600 mb-3">
                                {{ Str::limit(strip_tags($post->content), 100) }}
                            </p>
                            <span
                                class="inline-flex items-center text-kemenag-green hover:text-kemenag-light-green text-xs md:text-sm font-medium">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </span>
                        </article>
                    </a>
                @endforeach
            </div>



            <!-- View All Button -->
            <div class="text-center mt-8 md:mt-12">
                <a href="{{ route('berita.index') }}"
                    class="inline-flex items-center bg-kemenag-green text-white px-6 py-3 rounded-lg font-semibold hover:bg-kemenag-light-green transition-colors">
                    <i class="fas fa-newspaper mr-2"></i>
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8 md:mb-12">
                <h3 class="text-2xl md:text-3xl font-bold text-kemenag-green mb-4">
                    Statistik Survey Kepuasan
                </h3>
                <p class="text-gray-600 text-sm md:text-base">
                    Rekap data survey kepuasan layanan KUA Gerih
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Total Survey -->
                <div
                    class="bg-green-50 border-l-4 border-green-500 rounded-lg p-6 flex flex-col items-center justify-center">
                    <div class="text-sm text-gray-500 mb-2">Total Survey</div>
                    <div class="text-3xl font-bold text-green-700">{{ $stat['total'] ?? 0 }}</div>
                </div>

                <!-- Rata-rata Rating -->
                <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6 flex flex-col items-center justify-center">
                    <div class="text-sm text-gray-500 mb-2">Rata-rata Rating</div>
                    @php
                        $emojis = [1 => '😡', 2 => '😞', 3 => '😐', 4 => '😊', 5 => '😍'];
                        $avg = round($stat['avg'] ?? 0);
                    @endphp
                    <div class="flex items-center gap-2 text-xl font-bold text-blue-700">
                        <span class="text-2xl">{{ $emojis[$avg] ?? '😐' }}</span>
                        <span>{{ number_format($stat['avg'], 2) ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 md:py-16 bg-kemenag-green text-white">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">
                Statistik Pelayanan
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 text-center">
                @foreach ($hit as $nama => $data)
                    <div>
                        <div class="text-2xl md:text-3xl lg:text-4xl font-bold text-kemenag-gold mb-2">
                            {{ $data['total'] }}
                        </div>
                        <p class="text-xs md:text-sm">{{ $nama }}</p>
                        <p class="text-xs md:text-sm text-gray-200">
                            {{ \Carbon\Carbon::parse($data['tanggal'])->isoFormat('MMMM YYYY') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Contact Info -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl md:text-3xl font-bold text-center text-kemenag-green mb-8 md:mb-12">
                Informasi Kontak
            </h3>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <div class="text-center p-6">
                    <div
                        class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-xl md:text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                        Alamat
                    </h4>
                    <p class="text-xs md:text-sm text-gray-600">
                        Jl. Raya Geneng-Kendal<br />Kecamatan Gerih, Kabupaten Ngawi<br />Kode Pos
                        63253
                    </p>
                </div>
                <div class="text-center p-6">
                    <div
                        class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-xl md:text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                        Telepon
                    </h4>
                    <p class="text-xs md:text-sm text-gray-600">
                        Telp: 085784020366
                    </p>
                </div>
                <div class="text-center p-6">
                    <div
                        class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-xl md:text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                        Email
                    </h4>
                    <p class="text-xs md:text-sm text-gray-600">
                        kua.gerih@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </section>
    @if ($banner && $banner->status)
        <div class="popup-overlay active" id="popupBanner">
            <div class="popup-container">
                <!-- Banner gambar bisa diklik -->
                <a href="{{ $banner->link ?? '#' }}" target="_blank">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}"
                        class="popup-image-only" />
                </a>
                <!-- Tombol close -->
                <button class="image-close-btn" id="closePopup">×</button>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('popupBanner');
            const closeBtn = document.getElementById('closePopup');

            if (popup) {
                popup.classList.add('active'); // tampilkan otomatis saat home

                closeBtn.addEventListener('click', function() {
                    popup.classList.remove('active');
                });

                // klik luar container untuk close
                popup.addEventListener('click', function(e) {
                    if (e.target === popup) {
                        popup.classList.remove('active');
                    }
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('surveyChart').getContext('2d');
        const surveyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['😡', '😞', '😐', '😊', '😍'],
                datasets: [{
                    label: 'Jumlah Rating',
                    data: {!! json_encode(array_values($stat['chart'] ?? [0, 0, 0, 0, 0])) !!},
                    backgroundColor: [
                        '#f87171', '#fbbf24', '#a3a3a3', '#34d399', '#818cf8'
                    ],
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection
