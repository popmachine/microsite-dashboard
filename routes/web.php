<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MicrositeController;
use Illuminate\Support\Facades\Route;

// Redirect unauthenticated users to login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Microsite routes
    Route::get('/microsites', [MicrositeController::class, 'index'])->name('microsites.index');
    Route::get('/microsites/create', [MicrositeController::class, 'create'])->name('microsites.create');
    Route::post('/microsites', [MicrositeController::class, 'store'])->name('microsites.store');
    Route::post('/microsites/{id}/launch', [MicrositeController::class, 'launch'])->name('microsites.launch');
});

require __DIR__.'/auth.php';