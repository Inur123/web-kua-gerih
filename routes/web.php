<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Profile\SejarahController;

use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Profile\VisiMisiController;
use App\Http\Controllers\Admin\Posts\CategoryController;
use App\Http\Controllers\Profile\StrukturOrganisasiController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\RegulasiController as AdminRegulasiController;

// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('layanans', AdminLayananController::class);
     Route::resource('regulasis', AdminRegulasiController::class);

    // Tambah persyaratan dari detail layanan
    Route::post('layanans/{layanan}/persyaratans', [AdminLayananController::class, 'storePersyaratan'])
        ->name('layanans.persyaratans.store');
    Route::get('banner', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('banner', [BannerController::class, 'update'])->name('banner.update');

    // Survey untuk Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('survey', [App\Http\Controllers\Admin\SurveyController::class, 'index'])->name('survey.index');
        Route::get('survey/{id}/edit', [App\Http\Controllers\Admin\SurveyController::class, 'edit'])->name('survey.edit');
        Route::put('survey/{id}', [App\Http\Controllers\Admin\SurveyController::class, 'update'])->name('survey.update');
        Route::delete('survey/{id}', [App\Http\Controllers\Admin\SurveyController::class, 'destroy'])->name('survey.destroy');
    });
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/survey', [App\Http\Controllers\SurveyController::class, 'index'])->name('survey.index');
Route::post('/survey', [App\Http\Controllers\SurveyController::class, 'store'])->name('survey.store');
Route::get('/regulasi', [RegulasiController::class, 'index'])->name('regulasi.index');
Route::get('/regulasi/{slug}', [RegulasiController::class, 'show'])->name('regulasi.show');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{slug}', [LayananController::class, 'show'])->name('layanan.show');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/profile/sejarah', [SejarahController::class, 'index'])->name('profile.sejarah');
Route::get('/profile/visi-misi', [VisiMisiController::class, 'index'])->name('profile.visi-misi');
Route::get('/profile/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('profile.struktur-organisasi');
