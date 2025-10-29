<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Survey;
use App\Models\Layanan;
use App\Models\Category;
use App\Models\Regulasi;
use App\Models\TotalView;
use App\Models\TotalLayanan;
use App\Models\GaleriPamflet;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class DashboardController extends Controller
{
    public function index()
    {
        // Filter Post
        $postYear = request()->get('post_year', now()->year);

        $websiteFilter = request()->get('website_filter', 'year'); // year, week, day
        $websiteYear   = request()->get('website_year', now()->year);
        $websiteDay    = now()->toDateString(); // selalu hari ini jika harian
        $websiteWeek   = request()->get('website_week'); // optional untuk mingguan

        // Total untuk card
        $data = [
            'totalCategory' => Category::count(),
            'totalLayanan'  => Layanan::count(),
            'totalPost'     => Post::count(),
            'totalRegulasi' => Regulasi::count(),
            'totalSurvey'   => Survey::count(),
            'totalViewsWebsite' => TotalView::sum('count'),
            'postYear' => $postYear,
            'websiteFilter' => $websiteFilter,
            'websiteYear' => $websiteYear,
            'websiteDay' => $websiteDay,
            'websiteWeek' => $websiteWeek,
        ];

        // Chart Post (per bulan)
        $chartLabels = [];
        $chartData   = [];
        $viewsPerMonth = Post::select(
            DB::raw('MONTH(published_at) as month'),
            DB::raw('SUM(views) as total_views')
        )
            ->whereYear('published_at', $postYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_views', 'month');

        for ($m = 1; $m <= 12; $m++) {
            $chartLabels[] = Carbon::create()->month($m)->translatedFormat('F');
            $chartData[]   = $viewsPerMonth[$m] ?? 0;
        }

        $data['chartLabels'] = $chartLabels;
        $data['chartData']   = $chartData;

        // Chart Website
        $chartLabelsWebsite = [];
        $chartDataWebsite = [];

        if ($websiteFilter === 'day') {
            // Harian per jam
            $viewsWebsitePerHour = TotalView::select(
                DB::raw('HOUR(created_at) as hour'),
                DB::raw('SUM(count) as total_views')
            )
                ->whereDate('created_at', $websiteDay)
                ->groupBy('hour')
                ->orderBy('hour')
                ->pluck('total_views', 'hour');

            for ($h = 0; $h <= 23; $h++) {
                $chartLabelsWebsite[] = $h . ':00';
                $chartDataWebsite[]   = $viewsWebsitePerHour[$h] ?? 0;
            }
        } elseif ($websiteFilter === 'week') {
            // Mingguan per hari
            $startOfWeek = Carbon::parse($websiteWeek)->startOfWeek();
            $endOfWeek = $startOfWeek->copy()->endOfWeek();
            $days = [];
            $labels = [];
            for ($date = $startOfWeek->copy(); $date->lte($endOfWeek); $date->addDay()) {
                $days[] = $date->toDateString();
                $labels[] = $date->translatedFormat('l'); // Senin, Selasa, dst
            }

            $viewsPerDay = TotalView::select(
                DB::raw('DATE(created_at) as day'),
                DB::raw('SUM(count) as total_views')
            )
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->groupBy(DB::raw('DATE(created_at)'))
                ->pluck('total_views', 'day');

            foreach ($days as $day) {
                $chartLabelsWebsite[] = Carbon::parse($day)->translatedFormat('l');
                $chartDataWebsite[] = $viewsPerDay[$day] ?? 0;
            }
        } else {
            // Tahunan per bulan
            $viewsWebsitePerMonth = TotalView::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(count) as total_views')
            )
                ->whereYear('created_at', $websiteYear)
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('total_views', 'month');

            for ($m = 1; $m <= 12; $m++) {
                $chartLabelsWebsite[] = Carbon::create()->month($m)->translatedFormat('F');
                $chartDataWebsite[]   = $viewsWebsitePerMonth[$m] ?? 0;
            }
        }

        $data['chartLabelsWebsite'] = $chartLabelsWebsite;
        $data['chartDataWebsite']   = $chartDataWebsite;

        // Aktivitas Terkini
        $activities = collect()
            ->merge(Category::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Kategori',
                'name'  => $item->name,
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-list'
            ]))
            ->merge(Layanan::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Layanan',
                'name'  => $item->name,
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-handshake'
            ]))
            ->merge(Post::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Berita',
                'name'  => $item->title,
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-newspaper'
            ]))
            ->merge(Regulasi::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Regulasi',
                'name'  => $item->title,
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-book'
            ]))
            ->merge(Survey::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Survey',
                'name'  => $item->name,
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-star'
            ]))
            // Tambahkan GaleriPamflet
            ->merge(GaleriPamflet::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Galeri Pamflet',
                'name'  => $item->title,
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-image'
            ]))
            ->merge(TotalLayanan::with('layanan')->latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Total Layanan',
                'name'  => $item->layanan->nama ?? 'Layanan tidak ditemukan',
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-handshake'
            ]))

            // Tambahkan Banner
            ->merge(Banner::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Banner',
                'name'  => $item->title,
                'time'  => $item->updated_at,
                'action' => $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-image'
            ]))
            ->sortByDesc('time')
            ->take(5);

        $data['recentActivities'] = $activities;


        return view('admin.dashboard', $data);
    }
}
