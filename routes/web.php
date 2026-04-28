<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/services', [MainController::class, 'services'])->name('services');
Route::get('/gallery', [MainController::class, 'gallery'])->name('gallery');
Route::get('/blogs', [MainController::class, 'blogs'])->name('blogs');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');

Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');

// Routes only for GUESTS (not logged in)
Route::middleware('guest')->group(function () {
    // Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
    // Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Routes only for AUTHENTICATED users (logged in)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'viewDashboard'])->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/aspirasi-saya', [AspirasiController::class, 'myAspirasi'])->name('aspirasi.user.mine');
    Route::get('/aspirasi/{aspirasi}/edit', [AspirasiController::class, 'edit'])->name('aspirasi.user.edit');
    Route::put('/aspirasi/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.user.update');
    Route::delete('/aspirasi/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.user.destroy');

    // Admin Role Routes
    Route::middleware(IsAdmin::class)->group(function () {
        // We changed the URL slightly to make it clear this is an admin action
        Route::get('/admin/register-anggota', [AuthController::class, 'viewRegister'])->name('admin.register');
        Route::post('/admin/register-anggota', [AuthController::class, 'register']);

        // Update and Destroy
        Route::get('/admin/anggota/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/anggota/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/anggota/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});
