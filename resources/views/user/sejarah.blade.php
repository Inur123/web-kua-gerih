@extends('user.layouts.app')
@section('title', 'Sejarah - Kua Gerih')
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Sejarah KUA Kecamatan</h1>

                 <!-- Hero Image  -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                    <img src="/placeholder.svg?height=300&width=800" alt="Gedung KUA Lama" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <p class="text-center text-gray-600 italic">Gedung KUA pada masa awal berdiri (1975)</p>
                    </div>
                </div>

                 <!-- Timeline  -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-8 text-center">Perjalanan Sejarah</h2>

                    <div class="relative">
                         <!-- Timeline Line  -->
                        <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-kemenag-green"></div>

                         <!-- Timeline Items  -->
                        <div class="space-y-8">
                             <!-- 1975  -->
                            <div class="flex items-start space-x-6">
                                <div class="bg-kemenag-green text-white w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    1975
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg flex-1">
                                    <h3 class="font-bold text-kemenag-green mb-2">Pendirian KUA</h3>
                                    <p class="text-gray-700">KUA Kecamatan didirikan berdasarkan Keputusan Menteri Agama RI dengan wilayah kerja meliputi 12 desa/kelurahan. Pada awal berdiri, KUA menempati gedung sederhana dengan 3 orang pegawai.</p>
                                </div>
                            </div>

                             <!-- 1985  -->
                            <div class="flex items-start space-x-6">
                                <div class="bg-kemenag-green text-white w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    1985
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg flex-1">
                                    <h3 class="font-bold text-kemenag-green mb-2">Renovasi Pertama</h3>
                                    <p class="text-gray-700">Dilakukan renovasi besar-besaran gedung KUA untuk meningkatkan kualitas pelayanan. Penambahan ruang pelayanan dan fasilitas pendukung lainnya.</p>
                                </div>
                            </div>

                             <!-- 1995  -->
                            <div class="flex items-start space-x-6">
                                <div class="bg-kemenag-green text-white w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    1995
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg flex-1">
                                    <h3 class="font-bold text-kemenag-green mb-2">Penambahan Program</h3>
                                    <p class="text-gray-700">Penambahan program bimbingan pranikah dan penyuluhan agama. KUA mulai aktif dalam kegiatan pembinaan keluarga sakinah di masyarakat.</p>
                                </div>
                            </div>

                             <!-- 2005  -->
                            <div class="flex items-start space-x-6">
                                <div class="bg-kemenag-green text-white w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    2005
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg flex-1">
                                    <h3 class="font-bold text-kemenag-green mb-2">Era Digitalisasi</h3>
                                    <p class="text-gray-700">Implementasi sistem informasi manajemen nikah (SIMKAH) untuk mempercepat dan mempermudah proses administrasi pernikahan.</p>
                                </div>
                            </div>

                             <!-- 2015  -->
                            <div class="flex items-start space-x-6">
                                <div class="bg-kemenag-green text-white w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    2015
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg flex-1">
                                    <h3 class="font-bold text-kemenag-green mb-2">Gedung Baru</h3>
                                    <p class="text-gray-700">Pembangunan gedung KUA yang baru dengan fasilitas modern dan lebih representatif untuk melayani masyarakat dengan lebih baik.</p>
                                </div>
                            </div>

                             <!-- 2020  -->
                            <div class="flex items-start space-x-6">
                                <div class="bg-kemenag-gold text-white w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    2020
                                </div>
                                <div class="bg-gray-50 p-6 rounded-lg flex-1">
                                    <h3 class="font-bold text-kemenag-green mb-2">Layanan Online</h3>
                                    <p class="text-gray-700">Peluncuran layanan online untuk pendaftaran nikah dan layanan administrasi lainnya, terutama untuk menghadapi pandemi COVID-19.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Achievements  -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-kemenag-green mb-6">Pencapaian</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center">
                                    <span class="text-sm">🏆</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">KUA Terbaik Tingkat Kabupaten</h4>
                                    <p class="text-sm text-gray-600">Tahun 2018, 2020, 2022</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center">
                                    <span class="text-sm">📊</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Pelayanan Prima</h4>
                                    <p class="text-sm text-gray-600">Sertifikat ISO 9001:2015</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="bg-kemenag-gold text-white w-8 h-8 rounded-full flex items-center justify-center">
                                    <span class="text-sm">💻</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Digitalisasi Terdepan</h4>
                                    <p class="text-sm text-gray-600">Implementasi SIMKAH 100%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-kemenag-green mb-6">Data Historis</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                <span class="text-gray-700">Total Pernikahan (1975-2024)</span>
                                <span class="font-bold text-kemenag-green">15,432</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                <span class="text-gray-700">Rujuk yang Diproses</span>
                                <span class="font-bold text-kemenag-green">1,234</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                <span class="text-gray-700">Wakaf Terdaftar</span>
                                <span class="font-bold text-kemenag-green">89</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-200">
                                <span class="text-gray-700">Jamaah Haji Dibimbing</span>
                                <span class="font-bold text-kemenag-green">2,567</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
