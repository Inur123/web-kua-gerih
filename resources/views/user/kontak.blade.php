@extends('user.layouts.app')
@section('title', 'Kontak - KUA Gerih')
@section('content')
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold text-kemenag-green mb-8 text-center">Hubungi Kami</h1>

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Contact Info  -->
                    <div class="bg-white rounded-lg shadow-lg p-8 space-y-8">
                        <h2 class="text-2xl font-bold text-kemenag-green mb-6">Informasi Kantor</h2>

                        <div class="flex items-start space-x-4">
                            <div
                                class="bg-kemenag-green text-white w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">📍</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">Alamat</h3>
                                <p class="text-gray-600">
                                    Jl. Raya Geneng-Kendal<br>
                                    Kecamatan Gerih, Kabupaten Ngawi<br>
                                    Provinsi Jawa Timur, Kode Pos 63253
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="bg-kemenag-green text-white w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">📞</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">Telepon</h3>
                                <p class="text-gray-600">Telp: 08113600791</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="bg-kemenag-green text-white w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">📧</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">Email</h3>
                                <p class="text-gray-600">
                                    kua@kemenag.go.id<br>
                                    info@kua-kecamatan.go.id
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="bg-kemenag-green text-white w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🕒</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-1">Jam Pelayanan</h3>
                                <p class="text-gray-600">
                                    Senin - Kamis: 07:30 - 16:00<br>
                                    Jumat: 07:30 - 16:30<br>
                                    Sabtu & Minggu: Tutup
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Map  -->
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-kemenag-green mb-6">Lokasi Kami</h2>
                        <div class="rounded-lg overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.489103003377!2d111.37182329999999!3d-7.5215078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79ec7317a5aacd%3A0x2a31e161811da69f!2sKUA%20KEC.%20GERIH!5e0!3m2!1sid!2sid!4v1755244008703!5m2!1sid!2sid"
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="mt-4">
                            <a href="https://maps.app.goo.gl/Tnyb6pahPjVUPHMm7" target="_blank"
                                class="inline-flex items-center text-kemenag-green hover:underline">
                                <span class="mr-2">📍</span>
                                Lihat di Google Maps
                            </a>
                        </div>
                    </div>
                </div>

                <!-- FAQ Section  -->
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-kemenag-green mb-8 text-center">Pertanyaan yang Sering Diajukan</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="font-semibold text-kemenag-green mb-3">Berapa lama proses pendaftaran nikah?</h3>
                            <p class="text-gray-700 text-sm">Proses pendaftaran nikah membutuhkan waktu minimal 10 hari kerja setelah semua dokumen lengkap dan terverifikasi.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="font-semibold text-kemenag-green mb-3">Apa saja dokumen yang diperlukan untuk nikah?</h3>
                            <p class="text-gray-700 text-sm">Dokumen yang diperlukan meliputi surat N1-N4, KTP, KK, pas foto, dan dokumen pendukung lainnya sesuai ketentuan.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="font-semibold text-kemenag-green mb-3">Apakah ada biaya untuk layanan KUA?</h3>
                            <p class="text-gray-700 text-sm">Ya, terdapat biaya administrasi sesuai dengan peraturan yang berlaku. Informasi detail dapat ditanyakan langsung ke petugas.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="font-semibold text-kemenag-green mb-3">Bagaimana cara mengurus wakaf?</h3>
                            <p class="text-gray-700 text-sm">Untuk mengurus wakaf, silakan datang langsung ke KUA dengan membawa dokumen kepemilikan tanah dan identitas diri.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
