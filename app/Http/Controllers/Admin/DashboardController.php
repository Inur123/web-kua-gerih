<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Layanan;
use App\Models\Post;
use App\Models\Regulasi;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $year = request()->get('year', now()->year);

        // Hitung total untuk card
        $data = [
            'totalCategory' => Category::count(),
            'totalLayanan'  => Layanan::count(),
            'totalPost'     => Post::count(),
            'totalRegulasi' => Regulasi::count(),
            'totalSurvey'   => Survey::count(),
        ];

        // Ambil data views per bulan
        $viewsPerMonth = Post::select(
                DB::raw('MONTH(published_at) as month'),
                DB::raw('SUM(views) as total_views')
            )
            ->whereYear('published_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_views', 'month');

        // Siapkan array untuk chart (isi 0 kalau bulan tidak ada data)
        $chartLabels = [];
        $chartData = [];
        for ($m = 1; $m <= 12; $m++) {
            $chartLabels[] = date('F', mktime(0, 0, 0, $m, 1));
            $chartData[] = $viewsPerMonth[$m] ?? 0;
        }

        $data['chartLabels'] = $chartLabels;
        $data['chartData']   = $chartData;
        $data['selectedYear'] = $year;

        // Ambil aktivitas terkini dari model yang ada (create & update)
        $activities = collect()
            ->merge(Category::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Kategori',
                'name'  => $item->name,
                'time'  => $item->updated_at,
                'action'=> $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-list'
            ]))
            ->merge(Layanan::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Layanan',
                'name'  => $item->name,
                'time'  => $item->updated_at,
                'action'=> $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-handshake'
            ]))
            ->merge(Post::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Berita',
                'name'  => $item->title,
                'time'  => $item->updated_at,
                'action'=> $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-newspaper'
            ]))
            ->merge(Regulasi::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Regulasi',
                'name'  => $item->title,
                'time'  => $item->updated_at,
                'action'=> $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-book'
            ]))
            ->merge(Survey::latest('updated_at')->take(5)->get()->map(fn($item) => [
                'model' => 'Survey',
                'name'  => $item->name,
                'time'  => $item->updated_at,
                'action'=> $item->created_at->eq($item->updated_at) ? 'create' : 'update',
                'icon'  => 'fa-star'
            ]))
            ->sortByDesc('time')
            ->take(5);

        $data['recentActivities'] = $activities;

        return view('admin.dashboard', $data);
    }
}
