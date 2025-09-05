@extends('admin.layouts.app')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 mb-8">
        <!-- Total Category -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">Total Category</p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        {{ $totalCategory }}
                    </h3>
                </div>
                <div class="bg-kemenag-gold bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-layer-group"></i>
                </div>
            </div>
        </div>

        <!-- Total Layanan -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-light-green">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">Total Layanan</p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        {{ $totalLayanan }}
                    </h3>
                </div>
                <div class="bg-kemenag-light-green bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-handshake"></i>
                </div>
            </div>
        </div>

        <!-- Total Post -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-green">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">Total Post</p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        {{ $totalPost }}
                    </h3>
                </div>
                <div class="bg-kemenag-green bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>

        <!-- Total Regulasi -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-gold">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">Total Regulasi</p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        {{ $totalRegulasi }}
                    </h3>
                </div>
                <div class="bg-kemenag-gold bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-scale-balanced"></i>
                </div>
            </div>
        </div>

        <!-- Total Survey -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-kemenag-light-green">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs sm:text-sm">Total Survey</p>
                    <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-kemenag-green">
                        {{ $totalSurvey }}
                    </h3>
                </div>
                <div class="bg-kemenag-light-green bg-opacity-10 text-white p-2 sm:p-3 rounded-lg">
                    <i class="fas fa-poll"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Tables -->
    <div class="grid grid-cols-1 gap-4 md:gap-6 mb-8 lg:grid-cols-3">
        <!-- Chart -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm lg:col-span-2">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 gap-2">
                <h3 class="font-semibold text-kemenag-green text-base sm:text-lg">
                    Statistik Views Post Tahun Ini
                </h3>
                <form method="GET" class="flex items-center">
                    <select name="year" onchange="this.form.submit()"
                        class="border rounded-lg px-3 py-1 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-kemenag-light-green border-kemenag-green">
                        @for ($i = now()->year; $i >= now()->year - 5; $i--)
                            <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>Tahun
                                {{ $i }}</option>
                        @endfor
                    </select>
                </form>
            </div>
            <div class="bg-gray-100 h-40 sm:h-48 md:h-64 rounded-lg flex items-center justify-center p-4">
                <canvas id="viewsChart"></canvas>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-sm">
            <h3 class="font-semibold text-kemenag-green mb-4 text-base sm:text-lg">
                Aktivitas Terkini
            </h3>
            <div class="space-y-4">
                @forelse($recentActivities as $activity)
                    <div class="flex items-start">
                        <div
                            class="@if ($activity['action'] === 'create') bg-kemenag-green
                            @else bg-kemenag-gold @endif text-white p-2 rounded-full mr-3">
                            <i
                                class="@if ($activity['action'] === 'create') fas fa-plus
                              @else fas fa-edit @endif text-xs"></i>
                        </div>
                        <div>
                            <p class="text-xs sm:text-sm font-medium">
                                {{ $activity['model'] }}: {{ $activity['name'] }}
                                <span class="italic text-gray-500">
                                    ({{ $activity['action'] === 'create' ? 'ditambahkan' : 'diperbarui' }})
                                </span>
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ $activity['time']->format('d M Y - H:i') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada aktivitas terbaru.</p>
                @endforelse
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('viewsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Total Views',
                    data: {!! json_encode($chartData) !!},
                    backgroundColor: 'rgba(34, 197, 94, 0.7)', // warna hijau transparan
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endsection
