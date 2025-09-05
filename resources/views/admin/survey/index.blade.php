@extends('admin.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 bg-gray-100 min-h-screen">

        @php
            $emojis = [1 => '😡', 2 => '😞', 3 => '😐', 4 => '😊', 5 => '😍'];
            $avg = round($stat['avg'] ?? 0);
        @endphp

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            <!-- Total Survey -->
            <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-green">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-xs sm:text-sm">Total Survey</p>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                            {{ $stat['total'] ?? 0 }}
                        </h3>
                    </div>
                    <div class="bg-kemenag-green  bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                        <i class="fas fa-poll text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    <span class="text-green-500">+10%</span> dari bulan lalu
                </p>
            </div>

            <!-- Average Rating -->
            <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-light-green">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-xs sm:text-sm">Rata-rata Rating</p>
                        <div class="flex items-center gap-2">
                            <span class="text-lg sm:text-xl md:text-2xl">{{ $emojis[$avg] ?? '😐' }}</span>
                            <span class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                                {{ number_format($stat['avg'] ?? 0, 2) }}
                            </span>
                        </div>
                    </div>
                    <div class="bg-kemenag-light-green bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                        <i class="fas fa-star text-l"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    <span class="text-green-500">+0.5</span> dari bulan lalu
                </p>
            </div>

            <!-- Most Rating -->
            <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-xs sm:text-sm">Rating Terbanyak</p>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                            {{ $emojis[$stat['most']] ?? '-' }}
                        </h3>
                    </div>
                    <div class="bg-kemenag-gold bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                        <i class="fas fa-trophy"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    <span class="text-green-500">+15%</span> dari bulan lalu
                </p>
            </div>

            <!-- Latest Survey -->
            <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-green">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-xs sm:text-sm">Survey Terbaru</p>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                            @if ($surveys->isNotEmpty())
                                {{ $surveys->first()->created_at->format('d M Y') }}
                            @else
                                -
                            @endif
                        </h3>
                    </div>
                    <div class="bg-kemenag-green bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    <span class="text-green-500">+20%</span> dari bulan lalu
                </p>
            </div>
        </div>

        <!-- Chart and Recent Surveys -->
        <div class="grid grid-cols-1 gap-4 sm:gap-6 mb-8 lg:grid-cols-3">
            <!-- Chart -->
            <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm lg:col-span-2">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 gap-2">
                    <h3 class="font-semibold text-kemenag-green text-base sm:text-lg">Statistik Rating Survey</h3>
                    <select
                        class="border rounded-lg px-3 py-1 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-kemenag-light-green"
                        onchange="window.location='?year='+this.value">
                        @for ($y = now()->year; $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                Tahun {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="w-full">
                    <canvas id="surveyChart" class="w-full h-40 sm:h-48 md:h-64"></canvas>
                </div>
            </div>

            <!-- Recent Surveys -->
            <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm">
                <h3 class="font-semibold text-kemenag-green mb-4 text-base sm:text-lg">Survey Terkini</h3>
                <div class="space-y-4">
                    @forelse($surveys->take(5) as $survey)
                        <div class="flex items-start">
                            <div class="bg-kemenag-light-green text-white p-2 rounded-full mr-3">
                                <i class="fas fa-star text-xs"></i>
                            </div>
                            <div>
                                <p class="text-xs sm:text-sm font-medium">
                                    {{ $survey->name ?? '-' }} - {{ $emojis[$survey->rating] ?? $survey->rating }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ optional($survey->created_at)->format('d M Y - H:i') ?? '-' }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs sm:text-sm text-gray-500">Belum ada survey terbaru.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Table Survey -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm">
            <h3 class="font-semibold text-kemenag-green mb-4 text-base sm:text-lg">Daftar Survey Kepuasan</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-xs sm:text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 sm:px-4 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">No
                            </th>
                            <th class="px-3 sm:px-4 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Nama
                            </th>
                            <th
                                class="px-3 sm:px-4 py-3 text-left font-medium text-gray-600 uppercase tracking-wider hidden sm:table-cell">
                                Email</th>
                            <th class="px-3 sm:px-4 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">
                                Rating</th>
                            <th
                                class="px-3 sm:px-4 py-3 text-left font-medium text-gray-600 uppercase tracking-wider hidden md:table-cell">
                                Feedback</th>
                            <th
                                class="px-3 sm:px-4 py-3 text-left font-medium text-gray-600 uppercase tracking-wider hidden lg:table-cell">
                                Tanggal</th>
                            <th class="px-3 sm:px-4 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($surveys as $survey)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-3 sm:px-4 py-3 whitespace-nowrap">
                                    <span class="text-xs sm:text-sm font-medium text-gray-800">
                                        {{ ($surveys->currentPage() - 1) * $surveys->perPage() + $loop->iteration }}
                                    </span>
                                </td>
                                <td class="px-3 sm:px-4 py-3">{{ $survey->name ?? '-' }}</td>
                                <td class="px-3 sm:px-4 py-3 hidden sm:table-cell">{{ $survey->email ?? '-' }}</td>
                                <td class="px-3 sm:px-4 py-3 text-center">
                                    <span
                                        class="text-lg sm:text-xl">{{ $emojis[$survey->rating] ?? $survey->rating }}</span>
                                </td>
                                <td class="px-3 sm:px-4 py-3 hidden md:table-cell">{{ $survey->feedback ?? '-' }}</td>
                                <td class="px-3 sm:px-4 py-3 hidden lg:table-cell">
                                    {{ optional($survey->created_at)->format('d M Y H:i') ?? '-' }}</td>
                                <td class="px-3 sm:px-4 py-3 whitespace-nowrap flex items-center gap-2">
                                    <a href="{{ route('admin.survey.edit', $survey->id) }}"
                                        class="inline-flex items-center px-3 py-1.5 text-xs sm:text-sm bg-kemenag-light-green text-white rounded-md hover:bg-green-500 transition-colors duration-150">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.survey.destroy', $survey->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 text-xs sm:text-sm bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors duration-150 cursor-pointer"
                                            onclick="return confirm('Yakin hapus data survey?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-3 sm:px-4 py-4 text-center text-gray-500 text-xs sm:text-sm">
                                    Belum ada data survey.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-3 sm:p-4 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-xs sm:text-sm text-gray-600">
                        Menampilkan <span class="font-medium">{{ $surveys->firstItem() ?? 0 }}</span> -
                        <span class="font-medium">{{ $surveys->lastItem() ?? 0 }}</span> dari
                        <span class="font-medium">{{ $surveys->total() ?? 0 }}</span> survey
                    </div>
                    <div class="flex items-center space-x-2">
                        @if ($surveys->onFirstPage())
                            <span class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $surveys->previousPageUrl() }}"
                                class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors duration-150">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        <div class="hidden sm:flex space-x-2">
                            @foreach ($surveys->getUrlRange(max(1, $surveys->currentPage() - 2), min($surveys->lastPage(), $surveys->currentPage() + 2)) as $page => $url)
                                @if ($page == $surveys->currentPage())
                                    <span
                                        class="px-3 py-1.5 rounded-md bg-kemenag-green text-white font-medium">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors duration-150">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if ($surveys->currentPage() < $surveys->lastPage() - 2)
                                <span class="px-2 py-1 text-gray-500">...</span>
                                <a href="{{ $surveys->url($surveys->lastPage()) }}"
                                    class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors duration-150">{{ $surveys->lastPage() }}</a>
                            @endif
                        </div>

                        <div class="sm:hidden flex items-center gap-2">
                            <span
                                class="px-3 py-1.5 rounded-md bg-gray-100 text-gray-700">{{ $surveys->currentPage() ?? 1 }}</span>
                            <span class="text-gray-500">/</span>
                            <span class="text-gray-600">{{ $surveys->lastPage() ?? 1 }}</span>
                        </div>

                        @if ($surveys->hasMorePages())
                            <a href="{{ $surveys->nextPageUrl() }}"
                                class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors duration-150">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="px-3 py-1.5 rounded-md border border-gray-200 text-gray-400 cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
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
                    backgroundColor: ['#ef4444', '#f59e0b', '#6b7280', '#10b981', '#6366f1'],
                    borderRadius: 8,
                    borderWidth: 1,
                    borderColor: '#e5e7eb'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 12
                        },
                        padding: 10,
                        cornerRadius: 6
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: window.innerWidth < 640 ? 10 : 12
                            }
                        },
                        grid: {
                            color: '#e5e7eb'
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 640 ? 12 : 14
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
@endsection
