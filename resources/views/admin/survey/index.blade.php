@extends('admin.layouts.app')

@section('content')
    @php
        $emojis = [1 => '😡', 2 => '😞', 3 => '😐', 4 => '😊', 5 => '😍'];
        $avg = round($stat['avg'] ?? 0);
    @endphp

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Survey -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-green">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs sm:text-sm text-gray-500">Total Survey</p>
                    <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-kemenag-green">
                        {{ $stat['total'] ?? 0 }}
                    </h3>
                </div>
                <div class="bg-kemenag-green bg-opacity-20 p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-poll text-white text-sm sm:text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Average Rating -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-light-green">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs sm:text-sm text-gray-500">Rata-rata Rating</p>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <span class="text-lg sm:text-xl lg:text-2xl">{{ $emojis[$avg] ?? '😐' }}</span>
                        <span class="text-lg sm:text-xl lg:text-2xl font-bold text-kemenag-green">
                            {{ number_format($stat['avg'] ?? 0, 2) }}
                        </span>
                    </div>
                </div>
                <div class="bg-kemenag-light-green bg-opacity-20 p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-star text-white text-sm sm:text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Most Rating -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs sm:text-sm text-gray-500">Rating Terbanyak</p>
                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-kemenag-green">
                        {{ $emojis[$stat['most']] ?? '-' }}
                    </h3>
                </div>
                <div class="bg-kemenag-gold bg-opacity-20 p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-trophy text-white text-sm sm:text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Latest Survey -->
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-blue-500">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs sm:text-sm text-gray-500">Survey Terbaru</p>
                    <h3 class="text-sm sm:text-base lg:text-lg font-bold text-kemenag-green">
                        @if ($surveys->isNotEmpty())
                           {{ \Carbon\Carbon::parse($surveys->first()->created_at)->translatedFormat('d F Y') ?? '-' }}
                        @else
                            -
                        @endif
                    </h3>
                </div>
                <div class="bg-blue-500 bg-opacity-10 p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-clock text-white text-sm sm:text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart and Recent Surveys -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6">
        <!-- Chart -->
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm lg:col-span-2 order-2 lg:order-1">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
                <h3 class="font-semibold text-kemenag-green text-sm sm:text-base lg:text-lg">Statistik Rating Survey</h3>
                <form method="GET" class="w-full sm:w-auto">
                    <select name="year" onchange="this.form.submit()"
                        class="w-full sm:w-auto text-xs sm:text-sm border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kemenag-light-green border-kemenag-green">
                        @for ($y = now()->year; $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                Tahun {{ $y }}
                            </option>
                        @endfor
                    </select>
                </form>
            </div>
            <div class="relative bg-gray-50 rounded-lg p-4 h-56 sm:h-64 md:h-72 lg:h-80">
                <canvas id="surveyChart"></canvas>
            </div>
        </div>

        <!-- Recent Surveys -->
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm order-1 lg:order-2">
            <h3 class="font-semibold text-kemenag-green mb-4 text-sm sm:text-base lg:text-lg">Survey Terkini</h3>
            <div class="space-y-3 max-h-72 sm:max-h-80 overflow-y-auto">
                @forelse($surveys->take(5) as $survey)
                    <div class="flex items-start gap-2 sm:gap-3">
                        <div class="flex-shrink-0 bg-kemenag-light-green text-white p-1.5 sm:p-2 rounded-full">
                            <i class="fas fa-star text-xs sm:text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs sm:text-sm font-medium truncate">
                                {{ $survey->name ?? '-' }} - {{ $emojis[$survey->rating] ?? $survey->rating }}
                            </p>
                            <p class="text-xs text-gray-500 italic">
                                Rating {{ $survey->rating }}/5
                            </p>
                            <p class="text-xs text-gray-400">
                               {{ optional($survey->created_at)->translatedFormat('d F Y - H:i') ?? '-' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-xs sm:text-sm text-center py-8">Belum ada survey terbaru.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Table Survey -->
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm overflow-hidden">
        <h3 class="font-semibold text-kemenag-green mb-4 text-sm sm:text-base lg:text-lg">Daftar Survey Kepuasan</h3>
        <div class="overflow-x-auto -mx-4 sm:mx-0">
            <table class="min-w-full divide-y divide-gray-200 text-xs sm:text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-left font-medium text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-600 uppercase tracking-wider hidden sm:table-cell">Email</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-600 uppercase tracking-wider">Layanan</th>
                        <th class="px-3 py-2 text-center font-medium text-gray-600 uppercase tracking-wider">Rating</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-600 uppercase tracking-wider hidden md:table-cell">Feedback</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-600 uppercase tracking-wider hidden lg:table-cell">Tanggal</th>
                        <th class="px-3 py-2 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($surveys as $survey)
                        <tr class="hover:bg-gray-50 text-xs sm:text-sm">
                            <td class="px-3 py-2 whitespace-nowrap">
                                {{ ($surveys->currentPage() - 1) * $surveys->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-3 py-2 font-medium">{{ $survey->name ?? '-' }}</td>
                            <td class="px-3 py-2 hidden sm:table-cell truncate max-w-xs">{{ $survey->email ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $survey->layanan->nama ?? '-' }}</td>
                            <td class="px-3 py-2 text-center">
                                <span class="text-lg sm:text-xl lg:text-2xl">{{ $emojis[$survey->rating] ?? $survey->rating }}</span>
                            </td>
                            <td class="px-3 py-2 hidden md:table-cell max-w-xs truncate">
                                {{ $survey->feedback ?? '-' }}
                            </td>
                            <td class="px-3 py-2 hidden lg:table-cell whitespace-nowrap">
                               {{ optional($survey->created_at)->translatedFormat('d F Y H:i') ?? '-' }}
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap text-xs">
                                <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                    <a href="{{ route('admin.survey.edit', $survey->id) }}"
                                        class="px-2 py-1 text-xs bg-kemenag-light-green text-white rounded hover:bg-green-600 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.survey.destroy', $survey->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600 transition w-full sm:w-auto"
                                            onclick="return confirm('Yakin hapus data survey?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-8 text-center text-gray-500 text-xs sm:text-sm">
                                Belum ada data survey.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 sm:mt-6 pt-4 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 text-xs sm:text-sm">
                <div class="text-gray-600">
                    Menampilkan <span class="font-medium">{{ $surveys->firstItem() ?? 0 }}</span> -
                    <span class="font-medium">{{ $surveys->lastItem() ?? 0 }}</span> dari
                    <span class="font-medium">{{ $surveys->total() ?? 0 }}</span> survey
                </div>
                <div class="flex items-center gap-1">
                    @if ($surveys->onFirstPage())
                        <span class="px-2 py-1 rounded border border-gray-200 text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </span>
                    @else
                        <a href="{{ $surveys->previousPageUrl() }}"
                            class="px-2 py-1 rounded border border-gray-200 text-gray-600 hover:bg-gray-50 transition">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </a>
                    @endif

                    <div class="hidden sm:flex gap-1">
                        @foreach ($surveys->getUrlRange(max(1, $surveys->currentPage() - 2), min($surveys->lastPage(), $surveys->currentPage() + 2)) as $page => $url)
                            @if ($page == $surveys->currentPage())
                                <span class="px-2 py-1 rounded bg-kemenag-green text-white font-medium text-xs">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-2 py-1 rounded border border-gray-200 text-gray-600 hover:bg-gray-50 transition text-xs">{{ $page }}</a>
                            @endif
                        @endforeach
                    </div>

                    <div class="sm:hidden text-gray-600">
                        Halaman {{ $surveys->currentPage() }} / {{ $surveys->lastPage() }}
                    </div>

                    @if ($surveys->hasMorePages())
                        <a href="{{ $surveys->nextPageUrl() }}"
                            class="px-2 py-1 rounded border border-gray-200 text-gray-600 hover:bg-gray-50 transition">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    @else
                        <span class="px-2 py-1 rounded border border-gray-200 text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let surveyChart;

        function initSurveyChart() {
            if (surveyChart) surveyChart.destroy();

            const ctx = document.getElementById('surveyChart').getContext('2d');
            const isMobile = window.innerWidth < 640;

            surveyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['😡', '😞', '😐', '😊', '😍'],
                    datasets: [{
                        label: 'Jumlah Rating',
                        data: {!! json_encode(array_values($stat['chart'] ?? [0, 0, 0, 0, 0])) !!},
                        backgroundColor: ['#ef4444', '#f59e0b', '#6b7280', '#10b981', '#6366f1'],
                        borderRadius: 6,
                        barThickness: isMobile ? 20 : 30,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: { mode: 'index', intersect: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0,
                                font: { size: isMobile ? 10 : 12 }
                            }
                        },
                        x: {
                            ticks: {
                                font: { size: isMobile ? 12 : 14 },
                                maxRotation: 0
                            }
                        }
                    }
                }
            });
        }

        // Init on load
        initSurveyChart();

        // Re-init on resize with debounce
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(initSurveyChart, 200);
        });
    </script>
@endsection
