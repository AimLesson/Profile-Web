<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InstitusiController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('front.home');
});

// Static About page
Route::get('/about', function () {
    return view('front.about');
});

// List of all institutions
Route::get('/institusi', [InstitusiController::class, 'list'])->name('institusi.list');

// Dashboard for authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Berita (news) routes
Route::middleware(['auth'])->group(function () {
    Route::resource('berita', BeritaController::class)->except('show');
});
Route::get('berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

// Dynamic routes for Institusi
Route::middleware('load.institusi')->group(function () {
    // Home route for specific Institusi
    Route::get('/institusi/{institusiSlug}', [InstitusiController::class, 'index'])->name('institusi.home');

    // About route for specific Institusi
    Route::get('/institusi/{institusiSlug}/about', [InstitusiController::class, 'about'])->name('institusi.about');

    // Generic about route without an institusiSlug
    Route::get('/about', [InstitusiController::class, 'about'])->name('about');

    // Detail route for Institusi
    Route::get('/institusi/{slug}/detail', [InstitusiController::class, 'show'])->name('institusi.detail');
});


// Authentication routes
require __DIR__ . '/auth.php';
