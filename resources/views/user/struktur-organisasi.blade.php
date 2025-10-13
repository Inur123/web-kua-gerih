@extends('user.layouts.app')
@section('title', 'Struktur Organisasi - Kua Gerih')
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Struktur Organisasi KUA Gerih</h1>

                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <div class="text-center mb-12">
                        <div class="inline-block bg-kemenag-green text-white p-6 rounded-lg shadow-md">
                            <img src="{{ asset('images/kepala-kua.png') }}" alt="Kepala KUA"
                                class="w-24 h-24 rounded-full mx-auto mb-4 border-4 border-white bg-white">
                            <h3 class="font-bold text-xl">WACHID BUDI SANTOSO. S.Ag,.</h3>
                            <p class="font-semibold">Kepala KUA</p>
                        </div>
                    </div>

                    <div class="flex justify-center mb-8">
                        <div class="w-px bg-gray-300 h-12"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">

                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold text-kemenag-green text-lg mb-4">Penghulu</h4>
                            <div class="space-y-4">
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/10.png') }}" alt="Penghulu"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">MUHAMMAD FURQON AHSANI S.H.</h5>
                                </div>
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    {{-- Pastikan foto 'ilham_majiid.jpg' ada di folder public/assets/images/ --}}
                                    <img src="{{ asset('images/8.png') }}" alt="Foto Ilham Muhammad Nur Majiid S.H."
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white object-cover">
                                    <h5 class="font-bold">ILHAM MUHAMMAD NUR MAJIID S.H.</h5>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold text-kemenag-green text-lg mb-4">Penyuluh Agama</h4>
                            <div class="space-y-4">
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/no-img.png') }}" alt="Penyuluh Agama"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">MOH. MASRUKHAN. S.Ag,.</h5>
                                </div>
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/7.png') }}" alt="Penyuluh Agama"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">AFA PRASETIYANTO S.Th.I</h5>
                                </div>
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/5.png') }}" alt="Penyuluh Agama"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">SUSILOWATI S.Th.I</h5>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold text-kemenag-green text-lg mb-4">Penata Penyusun Administrasi Kepenghuluan
                            </h4>
                            <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                <img src="{{ asset('images/1.png') }}" alt="Staff"
                                    class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                <h5 class="font-bold">NANIK HIDAYATI S.Th.I</h5>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold text-kemenag-green text-lg mb-4">Penata Layanan Operasional</h4>
                            <div class="space-y-4">
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/2.png') }}" alt="Staff"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">IBNU MIFTAHUDIN S.Pd.</h5>
                                </div>
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/3.png') }}" alt="Staff"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">DARUNUDIN S.Pd.</h5>
                                </div>
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/4.png') }}" alt="Staff"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">SUYATNO S.Pd.</h5>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold text-kemenag-green text-lg mb-4">Pengadministrasi Layanan</h4>
                            <div class="space-y-4">
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/6.png') }}" alt="Staff"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">SHIDIQ FAJAR CAHYONO</h5>
                                </div>
                                <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                    <img src="{{ asset('images/9.png') }}" alt="Staff"
                                        class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                    <h5 class="font-bold">AKMAL FUAD S.Pd.</h5>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold text-kemenag-green text-lg mb-4">Operator</h4>
                            <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                <img src="{{ asset('images/no-img.png') }}" alt="Operator"
                                    class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                <h5 class="font-bold">ARIN PURWA SETYA</h5>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow md:col-start-2 lg:col-start-auto">
                            <h4 class="font-bold text-kemenag-green text-lg mb-4">Penjaga Malam</h4>
                            <div class="bg-kemenag-light-green text-white p-4 rounded-lg">
                                <img src="{{ asset('images/no-img.png') }}" alt="Penjaga Malam"
                                    class="w-16 h-16 rounded-full mx-auto mb-2 bg-white">
                                <h5 class="font-bold">SANTO</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8 mt-16">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-kemenag-green mb-6">Tugas dan Fungsi</h2>
                        <div class="space-y-6">
                            <div>
                                <h3 class="font-semibold text-kemenag-green mb-2 flex items-center">
                                    <span
                                        class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">1</span>
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
                                    <span
                                        class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">2</span>
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
                                    <span
                                        class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">3</span>
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
                                    <span
                                        class="bg-kemenag-green text-white w-6 h-6 rounded-full flex items-center justify-center text-xs mr-2">4</span>
                                    Staf Administrasi & Pelaksana
                                </h3>
                                <ul class="text-sm text-gray-700 space-y-1 ml-8">
                                    <li>• Mengelola administrasi dan arsip</li>
                                    <li>• Melayani pendaftaran nikah</li>
                                    <li>• Mengelola sistem informasi dan operasional</li>
                                    <li>• Membantu seluruh pelayanan masyarakat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
