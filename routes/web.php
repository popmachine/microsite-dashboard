<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');

// ✅ Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// ✅ Forgot Password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');

// ✅ Reset Password
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->middleware('guest')->name('password.update');

// ❌ Registration disabled – redirect to login or 404
Route::get('/register', function () {
    return redirect('/login');
});
Route::post('/register', function () {
    abort(404);
});
use App\Http\Controllers\MicrositeController;

Route::middleware('auth')->group(function () {
    Route::get('/microsites', [MicrositeController::class, 'index'])->name('microsites.index');
    Route::get('/microsites/create', [MicrositeController::class, 'create'])->name('microsites.create');
    Route::post('/microsites', [MicrositeController::class, 'store'])->name('microsites.store');
    Route::get('/microsites/{id}', [MicrositeController::class, 'show'])->name('microsites.show');
    Route::post('/microsites/{id}/launch', [MicrositeController::class, 'launch'])->name('microsites.launch');
});