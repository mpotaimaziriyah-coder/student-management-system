<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\RegistrationController;


// Home Page
Route::get('/', [HomeController::class, 'index'])->name('index');


// Contact Page
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Registration
Route::get('/register', [RegisterController::class, 'register'])->name('register');


// Forgot Password
Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword.post');

// Reset Password
Route::get('/resetpassword', [ResetPasswordController::class, 'resetpassword'])->name('resetpassword');
Route::post('/resetpassword', [ResetPasswordController::class, 'resetpassword'])->name('resetpassword.post');


// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('lecturers', LecturerController::class);

    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::post('/registrations/{registration}/approve', [RegistrationController::class, 'approve'])->name('registrations.approve');
    Route::post('/registrations/{registration}/reject', [RegistrationController::class, 'reject'])->name('registrations.reject');

});


// Lecturer Routes
Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {

    Route::get('/dashboard', function () {
        return view('lecturer.dashboard');
    })->name('dashboard');

});


// Student Routes
Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('student.dashboard');

});