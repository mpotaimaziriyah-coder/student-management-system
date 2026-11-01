<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class,'register'])->name('register');
Route::post('/forgotpassword', [ForgotPasswordController::class,'forgotpassword'])->name('forgotpassword');
Route::get('/forgotpassword', [ForgotPasswordController::class,'forgotpassword'])->name('forgotpassword');
Route::get('/reset-password', [ResetPasswordController::class, 'resetpassword'])->name('password.reset');



