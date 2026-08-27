<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
<<<<<<< HEAD
| Web Routes
|--------------------------------------------------------------------------
*/

// TEST VERCEL
Route::get('/test-vercel', function () {
    return 'VERCEL PHP WORKS';
});

Route::get('/favicon.ico', function () {
    $path = public_path('favicon.ico');

    return file_exists($path)
        ? response()->file($path)
        : response('', 204);
});

Route::get('/favicon.png', function () {
    $path = public_path('favicon.ico');

    return file_exists($path)
        ? response()->file($path)
        : response('', 204);
});

// HALAMAN UTAMA
Route::get('/', [PortfolioController::class, 'index'])
    ->name('home');

// FORM KONTAK
Route::post('/kontak', [PortfolioController::class, 'kirimPesan'])
    ->name('kontak.kirim');

// DOWNLOAD CV
Route::get('/download-cv', [PortfolioController::class, 'downloadCv'])
    ->name('cv.download');
=======
| Web Routes - Portofolio Tema Laut
|--------------------------------------------------------------------------
|
| Di file ini Anda memetakan semua URL/route untuk website portofolio Anda.
|
*/

// Halaman Utama Portofolio
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Route Interaktif: Mengirim Pesan dari Form Kontak
Route::post('/kontak', [PortfolioController::class, 'kirimPesan'])->name('kontak.kirim');

// Route Interaktif: Unduh Berkas CV
Route::get('/download-cv', [PortfolioController::class, 'downloadCv'])->name('cv.download');
>>>>>>> d1c1463 (commit pertama)
