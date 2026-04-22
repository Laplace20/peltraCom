<?php

use App\Http\Controllers\CsrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/**
 * Public Routes
 * These routes are handled by Controllers to keep the logic clean and testable.
 */

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('LandingPage');

// CSR Page
Route::get('/csr', [CsrController::class, 'index'])->name('csr.index');

// News Pages
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Static / Information Pages
Route::get('/legalitas', [HomeController::class, 'legalitas'])->name('legalitas');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visiMisi');





