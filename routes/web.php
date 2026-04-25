<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/services', [MainController::class, 'services'])->name('services');
Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');
Route::get('/blogs', [MainController::class, 'blogs'])->name('blogs');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');

