@extends('user.layouts.app')
@section('title', 'Sejarah - Kua Gerih')
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Profil &  Sejarah KUA Kecamatan Gerih</h1>

                <!-- Hero Image -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                    <img src="{{ asset('images/foto-depan.png') }}" alt="Gedung KUA Gerih" class="w-full h-full object-cover">
                    <div class="p-6 text-center text-gray-600 italic">
                        Gedung KUA Kecamatan Gerih yang berdiri sejak tahun 2009
                    </div>
                </div>
                <!-- Kata Pengantar -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-center text-kemenag-green mb-4">KATA PENGANTAR</h2>
                    <p class="text-center text-lg mb-4">بسم الله الرحمن الرحيم</p>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        Segala puji hanya bagi Allah SWT Yang Maha Pengasih lagi Maha Penyayang.
                        Sholawat dan salam semoga Allah SWT limpahkan selamanya kepada Nabi Muhammad SAW,
                        keluarganya, para sahabatnya, serta seluruh umatnya yang setia memperjuangkan kebenaran
                        dan menegakkan al-Islam secara konsisten sampai akhir zaman.
                    </p>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        Kantor Urusan Agama merupakan satu dari sekian banyak organisasi yang merupakan satuan kerja
                        di lingkungan Kementerian Agama di tingkat kecamatan. KUA melaksanakan sebagian tugas
                        Kantor Kementerian Agama Kabupaten di bidang urusan agama Islam dalam wilayah Kecamatan.
                        Maka secara hirarkis, KUA merupakan satuan kerja paling dekat dengan masyarakat.
                    </p>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        Alhamdulillah, berkat izin dan rahmat Allah SWT kami dapat menyusun Profil KUA Kecamatan Gerih.
                        Kami menyadari sepenuhnya bahwa profil ini masih jauh dari sempurna. Oleh karena itu,
                        kritik dan saran sangat kami harapkan demi perbaikan di masa mendatang.
                    </p>

                    <p class="text-gray-700 leading-relaxed mb-6">
                        Kami mengucapkan terima kasih kepada semua pihak yang telah membantu dalam penyusunan profil ini.
                        Semoga jasa-jasa baik mereka mendapatkan balasan dari Allah SWT dan menjadi amal baik di sisi-Nya.
                        Aamiin.
                    </p>

                    <div class="text-right text-gray-700">
                        <p>Gerih, 1 oktober 2025</p>
                        <p>Kepala KUA Kecamatan Gerih</p>
                        <br>
                        <p class="font-semibold">Wachid Budi Santoso, S.Ag</p>
                    </div>
                </div>

                <!-- Letak Geografis -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Letak Geografis</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Kecamatan Gerih merupakan kecamatan dengan ketinggian ± 54-250 meter di atas permukaan laut,
                        dengan luas wilayah 35,78 km². Kecamatan ini mengalami 2 musim: kemarau dan penghujan.
                        Batas wilayah:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 mt-3">
                        <li>Utara: Kecamatan Geneng</li>
                        <li>Selatan: Kabupaten Magetan</li>
                        <li>Barat: Kecamatan Kendal</li>
                        <li>Timur: Kecamatan Geneng</li>
                    </ul>
                </div>
                <!-- Peta Kecamatan & Peta Dakwah -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Peta Wilayah & Peta Dakwah</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="text-center">
                            <h3 class="font-semibold text-gray-700 mb-2">Peta Kecamatan Gerih</h3>
                            <img src="{{ asset('images/peta-gerih.png') }}" class="rounded-lg shadow">
                        </div>
                        <div class="text-center">
                            <h3 class="font-semibold text-gray-700 mb-2">Peta Dakwah Penyuluh Agama Islam</h3>
                            <img src="{{ asset('images/peta-dakwah.png') }}" class="rounded-lg shadow">
                        </div>
                    </div>
                </div>


                <!-- Keadaan Penduduk -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Keadaan Penduduk</h2>
                    <p class="text-gray-700">
                        Jumlah penduduk ± 37.689 jiwa, tersebar di 5 desa:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 mt-3">
                        <li>Desa Gerih</li>
                        <li>Desa Guyung</li>
                        <li>Desa Keraskulon</li>
                        <li>Desa Widodaren</li>
                        <li>Desa Randusongo</li>
                    </ul>
                    <p class="text-gray-700 mt-3">
                        Mata pencaharian: 50% pertanian, 20% perdagangan, 20% jasa, 10% sektor lainnya.
                    </p>
                </div>

                <!-- Kondisi Obyektif -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Kondisi Obyektif</h2>
                    <p class="text-gray-700">
                        KUA Gerih berdiri di atas tanah 315 m² dengan bangunan permanen seluas 100 m².
                        Fasilitas: Balai Nikah, Ruang TU, Ruang Kepala, Ruang PPAI, Musholla, kamar mandi, dan toilet.
                    </p>
                </div>

                <!-- Tugas Pokok & Fungsi -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Tugas Pokok & Fungsi</h2>
                    <p class="text-gray-700 mb-3"><strong>Tugas Pokok:</strong> Melaksanakan sebagian tugas Kemenag
                        Kabupaten/Kota di bidang Urusan Agama Islam dalam wilayah Kecamatan.</p>
                    <p class="text-gray-700 font-semibold mb-2">Fungsi:</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Pelayanan dan bimbingan nikah/rujuk</li>
                        <li>Pemberdayaan keluarga sakinah</li>
                        <li>Pelayanan produk halal</li>
                        <li>Pengelolaan wakaf, zakat, infaq, shadaqah</li>
                        <li>Pembinaan masjid dan ukhuwah Islamiyah</li>
                    </ul>
                </div>

                <!-- Program Kerja -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Program Kerja</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Pelayanan Nikah dan Rujuk</li>
                        <li>Bimbingan Perkawinan</li>
                        <li>Wakaf</li>
                        <li>Pembuatan Sertifikat Halal</li>
                        <li>Pembinaan Masjid & Musholla</li>
                    </ul>
                </div>

                <!-- Data KUA -->
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Data KUA</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <p><strong>Kode Lokasi:</strong> 18</p>
                        <p><strong>Alamat:</strong> Jl. Raya Geneng - Kendal</p>
                        <p><strong>No. Telp:</strong> 08113600791</p>
                        <p><strong>Luas Tanah:</strong> 315 m²</p>
                        <p><strong>Luas Bangunan:</strong> 100 m²</p>
                        <p><strong>Status:</strong> Hak Milik Kemenag</p>
                        <p><strong>Tahun Berdiri:</strong> 2010</p>
                        <p><strong>Kondisi:</strong> Baik</p>
                    </div>
                </div>

                <!-- Jumlah Tempat Ibadah & Tanah Wakaf -->
                <div class="grid md:grid-cols-2 gap-8 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-kemenag-green mb-4">Jumlah Tempat Ibadah</h2>
                        <ul class="space-y-2 text-gray-700">
                            <li>Masjid: 51</li>
                            <li>Mushola: 193</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-bold text-kemenag-green mb-4">Tanah Wakaf</h2>
                        <p class="text-gray-700">Total 142 lokasi, luas 72.470,08 m²</p>
                    </div>
                </div>


                <!-- Gambar Keadaan KUA Kecamatan Gerih -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-4">Gambar Keadaan KUA Kecamatan Gerih</h2>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <!-- 1. Tampak Depan -->
                        <figure class="text-center">
                            <img src="{{ asset('images/gambar-kua.png') }}" alt="Tampak Depan 1"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Tampak Depan 1</figcaption>
                        </figure>

                        <figure class="text-center">
                            <img src="{{ asset('images/kua-2.png') }}" alt="Tampak Depan 2"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Tampak Depan 2</figcaption>
                        </figure>

                        <!-- 2. PTSP -->
                        <figure class="text-center">
                            <img src="{{ asset('images/ptsp.png') }}" alt="Ruang Pendaftaran (PTSP)"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Ruang Pendaftaran (PTSP)</figcaption>
                        </figure>

                        <!-- 3. Ruang Tunggu -->
                        <figure class="text-center">
                            <img src="{{ asset('images/pelayanan.png') }}" alt="Ruang Tunggu"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Ruang Tunggu Pelayanan</figcaption>
                        </figure>

                        <!-- 4. Ruang Kepala -->
                        <figure class="text-center">
                            <img src="{{ asset('images/kepala.png') }}" alt="Ruang Kepala"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Ruang Kepala</figcaption>
                        </figure>

                        <!-- 5. Ruang TU -->
                        <figure class="text-center">
                            <img src="{{ asset('images/ruang-kerja.png') }}" alt="Ruang TU"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Ruang Kerja / TU</figcaption>
                        </figure>

                        <!-- 6. Balai Nikah & Mushola -->
                        <figure class="text-center">
                            <img src="{{ asset('images/ruang-nikah.png') }}" alt="Balai Nikah"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Ruang Balai Nikah</figcaption>
                        </figure>

                        <figure class="text-center">
                            <img src="{{ asset('images/mushola.png') }}" alt="Mushola"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Mushola</figcaption>
                        </figure>

                        <!-- 7. Tempat Parkir -->
                        <figure class="text-center">
                            <img src="{{ asset('images/tempat-parkir.png') }}" alt="Tempat Parkir"
                                class="rounded-lg shadow mx-auto w-full h-48 object-cover">
                            <figcaption class="mt-2 text-sm text-gray-700 font-medium">Tempat Parkir</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
