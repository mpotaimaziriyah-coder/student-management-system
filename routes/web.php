<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->group(function () {
    Route::get('/dashboard', fn () => view('lecturer.dashboard'))->name('lecturer.dashboard');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('student.dashboard');
});
