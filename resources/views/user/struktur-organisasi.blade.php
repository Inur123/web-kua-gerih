@extends('user.layouts.app')
@section('title', 'Struktur Organisasi - Kua Gerih')
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Struktur Organisasi KUA</h1>

                 <!-- Organizational Chart  -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <div class="text-center mb-8">
                         <!-- Kepala KUA  -->
                        <div class="inline-block bg-kemenag-green text-white p-6 rounded-lg mb-6">
                            <img src="/placeholder.svg?height=100&width=100" alt="Kepala KUA" class="w-20 h-20 rounded-full mx-auto mb-3 bg-white">
                            <h3 class="font-bold text-lg">Drs. H. Ahmad Suharto, M.Ag</h3>
                            <p class="text-sm">Kepala KUA</p>
                            <p class="text-xs mt-1">NIP: 196501011990031001</p>
                        </div>
                    </div>

                     <!-- Staff Level  -->
                    <div class="grid md:grid-cols-3 gap-6">
                         <!-- Penghulu  -->
                        <div class="bg-kemenag-light-green text-white p-6 rounded-lg text-center">
                            <img src="/placeholder.svg?height=80&width=80" alt="Penghulu" class="w-16 h-16 rounded-full mx-auto mb-3 bg-white">
                            <h4 class="font-bold">H. Muhammad Yusuf, S.Ag</h4>
                            <p class="text-sm">Penghulu</p>
                            <p class="text-xs mt-1">NIP: 197203151998031002</p>
                        </div>

                         <!-- Penyuluh Agama  -->
                        <div class="bg-kemenag-light-green text-white p-6 rounded-lg text-center">
                            <img src="/placeholder.svg?height=80&width=80" alt="Penyuluh" class="w-16 h-16 rounded-full mx-auto mb-3 bg-white">
                            <h4 class="font-bold">Hj. Siti Aminah, S.Pd.I</h4>
                            <p class="text-sm">Penyuluh Agama</p>
                            <p class="text-xs mt-1">NIP: 198005102005012001</p>
                        </div>

                         <!-- Staf Administrasi  -->
                        <div class="bg-kemenag-light-green text-white p-6 rounded-lg text-center">
                            <img src="/placeholder.svg?height=80&width=80" alt="Admin" class="w-16 h-16 rounded-full mx-auto mb-3 bg-white">
                            <h4 class="font-bold">Budi Santoso, S.Kom</h4>
                            <p class="text-sm">Staf Administrasi</p>
                            <p class="text-xs mt-1">NIP: 199012252015031003</p>
                        </div>
                    </div>
                </div>

                 <!-- Job Descriptions  -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-kemenag-green mb-6">Tugas dan Fungsi</h2>

                        <div class="space-y-6">
                            <div>
                                <h3 class="font-semibold text-kemenag-green mb-2 flex items-center">
                                    <span class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">1</span>
                                    Kepala KUA
                                </h3>
                                <ul class="text-sm text-gray-700 space-y-1 ml-8">
                                    <li>• Memimpin dan mengkoordinasikan seluruh kegiatan KUA</li>
                                    <li>• Bertanggung jawab atas pelayanan administrasi nikah</li>
                                    <li>• Mengawasi pelaksanaan tugas bawahan</li>
                                    <li>• Membuat laporan kegiatan kepada atasan</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="font-semibold text-kemenag-green mb-2 flex items-center">
                                    <span class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">2</span>
                                    Penghulu
                                </h3>
                                <ul class="text-sm text-gray-700 space-y-1 ml-8">
                                    <li>• Melaksanakan akad nikah dan rujuk</li>
                                    <li>• Memberikan bimbingan pranikah</li>
                                    <li>• Mencatat peristiwa nikah dan rujuk</li>
                                    <li>• Menerbitkan akta nikah</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-kemenag-green mb-6">Struktur Pelayanan</h2>

                        <div class="space-y-6">
                            <div>
                                <h3 class="font-semibold text-kemenag-green mb-2 flex items-center">
                                    <span class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">3</span>
                                    Penyuluh Agama
                                </h3>
                                <ul class="text-sm text-gray-700 space-y-1 ml-8">
                                    <li>• Memberikan penyuluhan agama kepada masyarakat</li>
                                    <li>• Membimbing kegiatan keagamaan</li>
                                    <li>• Membantu pelaksanaan program KUA</li>
                                    <li>• Melakukan pendampingan sosial keagamaan</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="font-semibold text-kemenag-green mb-2 flex items-center">
                                    <span class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">4</span>
                                    Staf Administrasi
                                </h3>
                                <ul class="text-sm text-gray-700 space-y-1 ml-8">
                                    <li>• Mengelola administrasi dan arsip</li>
                                    <li>• Melayani pendaftaran nikah</li>
                                    <li>• Mengelola sistem informasi</li>
                                    <li>• Membantu pelayanan masyarakat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
