<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
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
