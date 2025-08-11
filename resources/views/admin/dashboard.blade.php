@extends('admin.layouts.app')

@section('content')

    <div class="grid grid-cols-1 gap-4 md:gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">
                        Total Pernikahan
                    </p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        1,234
                    </h3>
                </div>
                <div class="bg-kemenag-green bg-opacity-10 text-kemenag-green p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-ring"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">
                <span class="text-green-500">+12%</span> dari bulan lalu
            </p>
        </div>
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-light-green">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">Rujuk Diproses</p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        567
                    </h3>
                </div>
                <div class="bg-kemenag-light-green bg-opacity-10 text-kemenag-light-green p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-handshake"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">
                <span class="text-green-500">+5%</span> dari bulan lalu
            </p>
        </div>
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-green">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">
                        Wakaf Terdaftar
                    </p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        89
                    </h3>
                </div>
                <div class="bg-kemenag-green bg-opacity-10 text-kemenag-green p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-mosque"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">
                <span class="text-green-500">+3%</span> dari bulan lalu
            </p>
        </div>
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">Jamaah Haji</p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        456
                    </h3>
                </div>
                <div class="bg-kemenag-gold bg-opacity-10 text-kemenag-gold p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-kaaba"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">
                <span class="text-green-500">+8%</span> dari bulan lalu
            </p>
        </div>
    </div>
    <!-- Charts and Tables -->
    <div class="grid grid-cols-1 gap-4 md:gap-6 mb-8 lg:grid-cols-3">
        <!-- Chart -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm lg:col-span-2">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 gap-2">
                <h3 class="font-semibold text-kemenag-green text-base sm:text-lg">
                    Statistik Pernikahan Tahun Ini
                </h3>
                <select
                    class="border rounded-lg px-3 py-1 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-kemenag-light-green">
                    <option>Tahun 2024</option>
                    <option>Tahun 2023</option>
                    <option>Tahun 2022</option>
                </select>
            </div>
            <div class="bg-gray-100 h-40 sm:h-48 md:h-64 rounded-lg flex items-center justify-center">
                <p class="text-gray-400 text-xs sm:text-base">
                    [Grafik Statistik]
                </p>
            </div>
        </div>
        <!-- Recent Activities -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm">
            <h3 class="font-semibold text-kemenag-green mb-4 text-base sm:text-lg">
                Aktivitas Terkini
            </h3>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="bg-kemenag-gold text-white p-2 rounded-full mr-3">
                        <i class="fas fa-ring text-xs"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium">
                            Pendaftaran Nikah Baru
                        </p>
                        <p class="text-xs text-gray-500">12 Jan 2024 - 08:30</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-kemenag-light-green text-white p-2 rounded-full mr-3">
                        <i class="fas fa-handshake text-xs"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium">
                            Proses Rujuk Selesai
                        </p>
                        <p class="text-xs text-gray-500">11 Jan 2024 - 14:15</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-kemenag-green text-white p-2 rounded-full mr-3">
                        <i class="fas fa-mosque text-xs"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium">
                            Pendaftaran Wakaf Baru
                        </p>
                        <p class="text-xs text-gray-500">10 Jan 2024 - 10:45</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-kemenag-gold text-white p-2 rounded-full mr-3">
                        <i class="fas fa-kaaba text-xs"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium">
                            Pendaftaran Haji
                        </p>
                        <p class="text-xs text-gray-500">9 Jan 2024 - 16:20</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-kemenag-light-green text-white p-2 rounded-full mr-3">
                        <i class="fas fa-user text-xs"></i>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-medium">
                            Admin baru ditambahkan
                        </p>
                        <p class="text-xs text-gray-500">8 Jan 2024 - 09:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Data -->
    <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm mb-8">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 gap-2">
            <h3 class="font-semibold text-kemenag-green text-base sm:text-lg">
                Pendaftaran Nikah Terbaru
            </h3>
            <a href="#" class="text-xs sm:text-sm text-kemenag-light-green hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-xs sm:text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-2 sm:px-4 md:px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            No. Register
                        </th>
                        <th class="px-2 sm:px-4 md:px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Nama Calon
                        </th>
                        <th class="px-2 sm:px-4 md:px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-2 sm:px-4 md:px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-2 sm:px-4 md:px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap text-gray-500">
                            REG-2024-00123
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Ahmad & Siti</div>
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap text-gray-500">
                            15 Jan 2024
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap font-medium">
                            <a href="#" class="text-kemenag-light-green hover:text-kemenag-green mr-3">Detail</a>
                            <a href="#" class="text-kemenag-gold hover:text-yellow-600">Cetak</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap text-gray-500">
                            REG-2024-00122
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Budi & Ani</div>
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap text-gray-500">
                            14 Jan 2024
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Proses</span>
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap font-medium">
                            <a href="#" class="text-kemenag-light-green hover:text-kemenag-green mr-3">Detail</a>
                            <a href="#" class="text-kemenag-gold hover:text-yellow-600">Cetak</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap text-gray-500">
                            REG-2024-00121
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Dedi & Rina</div>
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap text-gray-500">
                            13 Jan 2024
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                        </td>
                        <td class="px-2 sm:px-4 md:px-6 py-4 whitespace-nowrap font-medium">
                            <a href="#" class="text-kemenag-light-green hover:text-kemenag-green mr-3">Detail</a>
                            <a href="#" class="text-kemenag-gold hover:text-yellow-600">Cetak</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
