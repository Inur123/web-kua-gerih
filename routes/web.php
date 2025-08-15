<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Posts\PostController;
use App\Http\Controllers\Admin\Posts\CategoryController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Profile\SejarahController;
use App\Http\Controllers\Profile\StrukturOrganisasiController;
use App\Http\Controllers\Profile\VisiMisiController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/profile/sejarah', [SejarahController::class, 'index'])->name('profile.sejarah');
Route::get('/profile/visi-misi', [VisiMisiController::class, 'index'])->name('profile.visi-misi');
Route::get('/profile/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('profile.struktur-organisasi');

