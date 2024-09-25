<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StaffAuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataDesaHome;
use App\Http\Controllers\InformasiHome;
use App\Http\Controllers\ProfilDesaHome;


Route::get('/', [BerandaController::class, 'index']);
Route::get('/detailberita', [BerandaController::class, 'berita'])->name('berita');
Route::get('/detailpengumuman', [BerandaController::class, 'pengumuman'])->name('pengumuman');
Route::get('/strukturorganisasi', [ProfilDesaHome::class, 'index']);
Route::get('/beritaa', [InformasiHome::class, 'index']);
Route::get('/pengumumandesa', [InformasiHome::class, 'Pengumuman']);
Route::get('/gambar', [InformasiHome::class, 'Galeri']);
Route::get('/pendidikan', [DataDesaHome::class, 'index']);
Route::get('/kependudukan', [DataDesaHome::class, 'Kependudukan']);
Route::get('/ekonomi', [DataDesaHome::class, 'Ekonomi']);
Route::get('/kesehatan', [DataDesaHome::class, 'Kesehatan']);
Route::get('/pertanian', [DataDesaHome::class, 'Pertanian']);
Route::get('/perternakan', [DataDesaHome::class, 'Perternakan']);
Route::get('detailberita/{id}/{slug}', [InformasiHome::class, 'DetailBerita'])->name('berita.detailberita');
Route::get('detailpengumuman/{id}/{slug}', [InformasiHome::class, 'DetailPengumuman'])->name('berita.detailpengumuman');

Route::get('/sejarahdesa', function(){
    return view('home.profildesa.sejarahdesa');
});


Route::get('/geografis', function(){
    return view('home.profildesa.geografis');
});

Route::get('/visimisi', function(){
    return view('home.profildesa.visimisi');
});


Route::get('/layananktp', function(){
    return view('home.layanan.layananktp');
});
Route::get('/layanankk', function(){
    return view('home.layanan.layanankk');
});
Route::get('/layananaktalahir', function(){
    return view('home.layanan.layananaktalahir');
});
Route::get('/layananaktanikah', function(){
    return view('home.layanan.layananaktanikah');
});
Route::get('/layanansuratpindah', function(){
    return view('home.layanan.layanansuratpindah');
});
Route::get('/layanansuratkematian', function(){
    return view('home.layanan.layanansuratkematian');
});
Route::get('/layanansurattanah', function(){
    return view('home.layanan.layanansurattanah');
});
Route::get('/layanansuratketeranganberusaha', function(){
    return view('home.layanan.layanansuratketeranganberusaha');
});
Route::get('/layanansktm', function(){
    return view('home.layanan.layanansktm');
});
Route::get('/layananskkb', function(){
    return view('home.layanan.layananskkb');
});


Route::group(['middleware' =>['auth', 'role:admin|staff']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'showProfile']);
    // patch atau put dua syntax yang sama untuk digunakan sebagai pengubah data
    Route::patch('profile/{id}', [UserController::class, 'update']);

    Route::resource('berita', BeritaController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('datadesa', DataDesaController::class);
    Route::resource('pengumuman', PengumumanController::class);
});


Route::get('/login', function(){
    return view('login.login');
});

Auth::routes();


// Route::get('/visimisidesa', function(){
//     return view('home.profildesa.visimisi');
// });




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');