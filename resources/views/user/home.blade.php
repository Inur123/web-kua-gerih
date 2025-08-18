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
                        Melayani Dengan Amanah
                    </h2>
                    <p class="text-base md:text-lg mb-6">
                        Kantor Urusan Agama siap melayani kebutuhan administrasi keagamaan
                        masyarakat dengan profesional dan terpercaya.
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
                    <img src="{{ asset('images/gambar-kua.png') }}" alt="KUA Hero Image"
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
                <div
                    class="text-center p-6 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow hover:border-kemenag-light-green">
                    <div
                        class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-ring text-2xl md:text-3xl"></i>
                    </div>
                    <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                        Pendaftaran Nikah
                    </h4>
                    <p class="text-xs md:text-sm text-gray-600">
                        Layanan pendaftaran pernikahan dan penerbitan akta nikah
                    </p>
                </div>
                <div
                    class="text-center p-6 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow hover:border-kemenag-light-green">
                    <div
                        class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-2xl md:text-3xl"></i>
                    </div>
                    <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                        Rujuk
                    </h4>
                    <p class="text-xs md:text-sm text-gray-600">
                        Pelayanan rujuk dan administrasi terkait
                    </p>
                </div>
                <div
                    class="text-center p-6 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow hover:border-kemenag-light-green">
                    <div
                        class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-mosque text-2xl md:text-3xl"></i>
                    </div>
                    <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                        Wakaf
                    </h4>
                    <p class="text-xs md:text-sm text-gray-600">
                        Pengelolaan dan administrasi wakaf
                    </p>
                </div>
                <div
                    class="text-center p-6 border border-gray-200 rounded-xl hover:shadow-lg transition-shadow hover:border-kemenag-light-green">
                    <div
                        class="bg-kemenag-green text-white w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-kaaba text-2xl md:text-3xl"></i>
                    </div>
                    <h4 class="font-semibold text-kemenag-green mb-2 text-sm md:text-base">
                        Haji & Umrah
                    </h4>
                    <p class="text-xs md:text-sm text-gray-600">
                        Informasi dan bimbingan ibadah haji dan umrah
                    </p>
                </div>
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
                    Informasi & Layanan Digital
                </h3>
                <p class="text-gray-600 text-sm md:text-base">
                    Akses mudah ke berbagai informasi dan layanan KUA
                </p>
            </div>

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Online Services -->
                <div
                    class="bg-gradient-to-r from-kemenag-gold to-yellow-400 p-6 rounded-xl text-kemenag-green hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-laptop text-2xl mr-3"></i>
                        <h4 class="font-bold text-lg">Layanan Digital</h4>
                    </div>
                    <p class="text-sm mb-4">
                        Akses layanan KUA secara online 24/7 untuk kemudahan Anda dalam
                        mengurus berbagai keperluan administrasi
                    </p>
                    <button
                        class="bg-kemenag-green text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-opacity-90 transition-colors w-full">
                        <i class="fas fa-external-link-alt mr-2"></i>Akses Sekarang
                    </button>
                </div>

                <!-- Download Center -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-download text-kemenag-green text-2xl mr-3"></i>
                        <h4 class="font-bold text-kemenag-green text-lg">
                            Pusat Unduhan
                        </h4>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Download formulir dan dokumen penting untuk berbagai keperluan
                        layanan KUA
                    </p>
                    <div class="space-y-3">
                        <a href="#"
                            class="flex items-center text-sm text-gray-600 hover:text-kemenag-green transition-colors p-2 rounded hover:bg-gray-50">
                            <i class="fas fa-file-pdf mr-3 text-red-500"></i>
                            <span>Formulir Pendaftaran Nikah</span>
                        </a>
                        <a href="#"
                            class="flex items-center text-sm text-gray-600 hover:text-kemenag-green transition-colors p-2 rounded hover:bg-gray-50">
                            <i class="fas fa-file-pdf mr-3 text-red-500"></i>
                            <span>Persyaratan Dokumen</span>
                        </a>
                        <a href="#"
                            class="flex items-center text-sm text-gray-600 hover:text-kemenag-green transition-colors p-2 rounded hover:bg-gray-50">
                            <i class="fas fa-file-pdf mr-3 text-red-500"></i>
                            <span>Panduan Layanan</span>
                        </a>
                    </div>
                </div>

                <!-- Quick Contact -->
                <div class="bg-kemenag-light-green p-6 rounded-xl text-white hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-headset text-2xl mr-3"></i>
                        <h4 class="font-bold text-lg">Bantuan Cepat</h4>
                    </div>
                    <p class="text-sm mb-4">
                        Butuh bantuan atau konsultasi? Tim customer service kami siap
                        membantu Anda
                    </p>
                    <div class="space-y-3">
                        <button
                            class="bg-white text-kemenag-green px-4 py-2 rounded-lg text-sm font-medium w-full hover:bg-gray-100 transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>Chat WhatsApp
                        </button>
                        <button
                            class="border border-white px-4 py-2 rounded-lg text-sm font-medium w-full hover:bg-white hover:text-kemenag-green transition-colors">
                            <i class="fas fa-phone mr-2"></i>Telepon Langsung
                        </button>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="bg-blue-50 p-6 rounded-xl border border-blue-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-question-circle text-blue-600 text-2xl mr-3"></i>
                        <h4 class="font-bold text-blue-800 text-lg">FAQ</h4>
                    </div>
                    <p class="text-sm text-blue-700 mb-4">
                        Temukan jawaban untuk pertanyaan yang sering diajukan seputar
                        layanan KUA
                    </p>
                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors w-full">
                        <i class="fas fa-search mr-2"></i>Lihat FAQ
                    </button>
                </div>

                <!-- Schedule -->
                <div class="bg-green-50 p-6 rounded-xl border border-green-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-calendar-alt text-green-600 text-2xl mr-3"></i>
                        <h4 class="font-bold text-green-800 text-lg">Jadwal & Agenda</h4>
                    </div>
                    <p class="text-sm text-green-700 mb-4">
                        Lihat jadwal kegiatan, agenda acara, dan jadwal pelayanan KUA
                    </p>
                    <button
                        class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition-colors w-full">
                        <i class="fas fa-calendar mr-2"></i>Lihat Jadwal
                    </button>
                </div>

                <!-- Feedback -->
                <div class="bg-purple-50 p-6 rounded-xl border border-purple-200 hover:shadow-lg transition-shadow">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-star text-purple-600 text-2xl mr-3"></i>
                        <h4 class="font-bold text-purple-800 text-lg">
                            Feedback & Saran
                        </h4>
                    </div>
                    <p class="text-sm text-purple-700 mb-4">
                        Berikan masukan untuk membantu kami meningkatkan kualitas
                        pelayanan
                    </p>
                    <button
                        class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-purple-700 transition-colors w-full">
                        <i class="fas fa-comment mr-2"></i>Kirim Feedback
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics -->
    <section class="py-12 md:py-16 bg-kemenag-green text-white">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">
                Statistik Pelayanan
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 text-center">
                <div>
                    <div class="text-2xl md:text-3xl lg:text-4xl font-bold text-kemenag-gold mb-2">
                        1,234
                    </div>
                    <p class="text-xs md:text-sm">Pernikahan Tahun Ini</p>
                </div>
                <div>
                    <div class="text-2xl md:text-3xl lg:text-4xl font-bold text-kemenag-gold mb-2">
                        567
                    </div>
                    <p class="text-xs md:text-sm">Rujuk Diproses</p>
                </div>
                <div>
                    <div class="text-2xl md:text-3xl lg:text-4xl font-bold text-kemenag-gold mb-2">
                        89
                    </div>
                    <p class="text-xs md:text-sm">Wakaf Terdaftar</p>
                </div>
                <div>
                    <div class="text-2xl md:text-3xl lg:text-4xl font-bold text-kemenag-gold mb-2">
                        456
                    </div>
                    <p class="text-xs md:text-sm">Jamaah Haji</p>
                </div>
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
                        Jl. Raya Kecamatan No. 123<br />Kecamatan, Kabupaten<br />Kode Pos
                        12345
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
                        Telp: (021) 123-4567<br />Fax: (021) 123-4568<br />HP:
                        0812-3456-7890
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
                        kua@kemenag.go.id<br />info@kua-kecamatan.go.id
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
@endsection
