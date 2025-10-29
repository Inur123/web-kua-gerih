@extends('admin.layouts.app')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 mb-6">
    <!-- Total Category -->
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Total Category</p>
                <h3 class="text-xl sm:text-2xl font-bold text-kemenag-green break-words">{{ $totalCategory }}</h3>
            </div>
            <div class="bg-kemenag-gold bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-layer-group text-white text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Total Layanan -->
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-light-green">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Total Layanan</p>
                <h3 class="text-xl sm:text-2xl font-bold text-kemenag-green break-words">{{ $totalLayanan }}</h3>
            </div>
            <div class="bg-kemenag-light-green bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-handshake text-white text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Total Post -->
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-green">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Total Post</p>
                <h3 class="text-xl sm:text-2xl font-bold text-kemenag-green break-words">{{ $totalPost }}</h3>
            </div>
            <div class="bg-kemenag-green bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-newspaper text-white text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Total Regulasi -->
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Total Regulasi</p>
                <h3 class="text-xl sm:text-2xl font-bold text-kemenag-green break-words">{{ $totalRegulasi }}</h3>
            </div>
            <div class="bg-kemenag-gold bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-scale-balanced text-white text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Total Survey -->
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-light-green">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Total Survey</p>
                <h3 class="text-xl sm:text-2xl font-bold text-kemenag-green break-words">{{ $totalSurvey }}</h3>
            </div>
            <div class="bg-kemenag-light-green bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-poll text-white text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Total Views Website (Card Baru) -->
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-kemenag-blue">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-xs sm:text-sm">Total Views Website</p>
                <h3 class="text-xl sm:text-2xl font-bold text-kemenag-green break-words">{{ $totalViewsWebsite }}</h3>
            </div>
            <div class="bg-kemenag-green bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-eye text-white text-lg"></i>

            </div>
        </div>
    </div>
</div>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm lg:col-span-2">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
                <h3 class="font-semibold text-kemenag-green text-base sm:text-lg">Statistik Views Post Tahun Ini</h3>
                <form method="GET" class="w-full sm:w-auto">
                    <select name="post_year" onchange="this.form.submit()"
                        class="w-full sm:w-auto border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-kemenag-light-green border-kemenag-green">
                        @for ($i = now()->year; $i >= now()->year - 5; $i--)
                            <option value="{{ $i }}" {{ $postYear == $i ? 'selected' : '' }}>
                                Tahun {{ $i }}
                            </option>
                        @endfor
                    </select>
                </form>
            </div>
            <div class="relative bg-gray-50 h-64 sm:h-72 md:h-80 rounded-lg p-4">
                <canvas id="viewsChart"></canvas>
            </div>
        </div>

        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm">

            <h3 class="font-semibold text-kemenag-green mb-4 text-base sm:text-lg">Aktivitas Terkini</h3>

            <div class="space-y-3 max-h-80 overflow-y-auto">

                @forelse($recentActivities as $activity)

                    <div class="flex items-start gap-3">

                        <div

                            class="flex-shrink-0 {{ $activity['action'] === 'create' ? 'bg-kemenag-green' : 'bg-kemenag-gold' }} text-white p-2 rounded-full">

                            <i class="{{ $activity['action'] === 'create' ? 'fas fa-plus' : 'fas fa-edit' }} text-xs"></i>

                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="text-sm font-medium truncate">

                                {{ $activity['model'] }}: {{ $activity['name'] }}

                            </p>

                            <p class="text-xs text-gray-500 italic">

                                {{ $activity['action'] === 'create' ? 'ditambahkan' : 'diperbarui' }}

                            </p>

                            <p class="text-xs text-gray-400">

                                {{ \Carbon\Carbon::parse($activity['time'])->translatedFormat('d F Y - H:i') }}

                            </p>

                        </div>

                    </div>

                @empty

                    <p class="text-gray-500 text-sm text-center py-8">Belum ada aktivitas terbaru.</p>

                @endforelse

            </div>

        </div>
    </div>

    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm mb-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
            <h3 class="font-semibold text-kemenag-green text-base sm:text-lg">Statistik Total Views Website</h3>
            <form method="GET" class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                @if ($websiteFilter == 'year')
                    <select name="website_year" onchange="this.form.submit()"
                        class="w-full sm:w-auto border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-kemenag-light-green border-kemenag-green">
                        @for ($i = now()->year; $i >= now()->year - 5; $i--)
                            <option value="{{ $i }}" {{ $websiteYear == $i ? 'selected' : '' }}>
                                Tahun {{ $i }}
                            </option>
                        @endfor
                    </select>
                @elseif($websiteFilter == 'week')
                    <select name="website_week" onchange="this.form.submit()"
                        class="w-full sm:w-auto border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-kemenag-light-green border-kemenag-green">
                        @for ($i = 0; $i < 52; $i++)
                            @php
                                $weekStart = now()->startOfYear()->addWeeks($i)->startOfWeek();
                                $weekEnd = $weekStart->copy()->endOfWeek();
                                $currentWeekStart = now()->startOfWeek();
                            @endphp
                            <option value="{{ $weekStart->toDateString() }}"
                                {{ $weekStart->toDateString() == ($websiteWeek ?? $currentWeekStart->toDateString()) ? 'selected' : '' }}>
                                Minggu ke-{{ $i + 1 }} ({{ $weekStart->translatedFormat('d M') }} -
                                {{ $weekEnd->translatedFormat('d M') }})
                            </option>
                        @endfor
                    </select>
                @elseif($websiteFilter == 'day')
                    <span class="w-full sm:w-auto text-sm px-3 py-2 border rounded-lg bg-gray-100 text-center">
                        {{ now()->translatedFormat('d F Y') }}
                    </span>
                @endif

                <select name="website_filter" onchange="this.form.submit()"
                    class="w-full sm:w-auto border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-kemenag-light-green border-kemenag-green">
                    <option value="year" {{ $websiteFilter == 'year' ? 'selected' : '' }}>Tahun</option>
                    <option value="week" {{ $websiteFilter == 'week' ? 'selected' : '' }}>Mingguan</option>
                    <option value="day" {{ $websiteFilter == 'day' ? 'selected' : '' }}>Harian</option>
                </select>
            </form>
        </div>
        <div class="relative bg-gray-50 h-64 sm:h-80 md:h-96 rounded-lg p-4">
            <canvas id="totalViewsWebsiteChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Simpan instance chart untuk bisa di-destroy nanti
        let chartPost, chartWebsite;

        function initCharts() {
            // Destroy chart lama jika ada
            if (chartPost) chartPost.destroy();
            if (chartWebsite) chartWebsite.destroy();

            // Chart Post Views
            const ctxPost = document.getElementById('viewsChart').getContext('2d');
            chartPost = new Chart(ctxPost, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'Total Views',
                        data: {!! json_encode($chartData) !!},
                        backgroundColor: 'rgba(34, 197, 94, 0.7)',
                        borderRadius: 6,
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
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        },
                        x: {
                            ticks: {
                                autoSkip: true,
                                maxRotation: 90,
                                minRotation: 0
                            }
                        }
                    }
                }
            });

            // Chart Website Views
            const ctxWebsite = document.getElementById('totalViewsWebsiteChart').getContext('2d');
            chartWebsite = new Chart(ctxWebsite, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartLabelsWebsite) !!},
                    datasets: [{
                        label: 'Total Views Website',
                        data: {!! json_encode($chartDataWebsite) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderRadius: 6,
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
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        },
                        x: {
                            ticks: {
                                autoSkip: true,
                                maxRotation: 90,
                                minRotation: 0
                            }
                        }
                    }
                }
            });
        }

        // Initialize charts saat halaman load
        initCharts();

        // Re-render chart saat window di-resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                initCharts();
            }, 250);
        });
    </script>
@endsection
