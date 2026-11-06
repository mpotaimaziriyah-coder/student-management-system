<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ProfileController;


 






use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Student\RegistrationController as StudentRegistrationController;
use App\Http\Controllers\Lecturer\CourseController as LecturerCourseController;


// Home Page
Route::get('/', [HomeController::class, 'index'])->name('index');


// Contact Page
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Demo logins (local only)
Route::get('/demo/{role}', [AuthController::class, 'demo'])->name('demo');

// Registration
Route::get('/register', [RegisterController::class, 'register'])->name('register');

// Forgot / Reset Password
Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword.post');
Route::get('/resetpassword', [ResetPasswordController::class, 'resetpassword'])->name('resetpassword');
Route::post('/resetpassword', [ResetPasswordController::class, 'resetpassword'])->name('resetpassword.post');


// Dashboard redirect (sends each user to their own dashboard)
Route::middleware('auth')->get('/home', function () {
    $user = auth()->user();

    if ($user->hasRole('admin'))    return redirect()->route('admin.dashboard');
    if ($user->hasRole('lecturer')) return redirect()->route('lecturer.dashboard');
    return redirect()->route('student.dashboard');
})->name('dashboard');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('lecturers', LecturerController::class);
    Route::get('/users', function () {
        $users = \App\Models\User::with('roles')->latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::post('/registrations/{registration}/approve', [RegistrationController::class, 'approve'])->name('registrations.approve');
    Route::post('/registrations/{registration}/reject', [RegistrationController::class, 'reject'])->name('registrations.reject');
    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');

});


// Lecturer Routes
Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {

    Route::get('/dashboard', function () {
        return view('lecturer.dashboard');
    })->name('dashboard');

    Route::get('/courses', [LecturerCourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [LecturerCourseController::class, 'show'])->name('courses.show');

});


// Student Routes
Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('student.dashboard');

    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/courses', [StudentCourseController::class, 'index'])->name('courses.index');
        Route::get('/registrations', [StudentRegistrationController::class, 'index'])->name('registrations.index');
        Route::post('/registrations', [StudentRegistrationController::class, 'store'])->name('registrations.store');
        Route::delete('/registrations/{registration}', [StudentRegistrationController::class, 'destroy'])->name('registrations.destroy');
    });

});
