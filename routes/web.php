<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('lecturers', LecturerController::class);

    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::post('/registrations/{registration}/approve', [RegistrationController::class, 'approve'])->name('registrations.approve');
    Route::post('/registrations/{registration}/reject', [RegistrationController::class, 'reject'])->name('registrations.reject');
});

Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('/dashboard', fn () => view('lecturer.dashboard'))->name('dashboard');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('student.dashboard');
});
