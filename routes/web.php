<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MancoreFtmController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('web')->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
        Route::get('/occupation', fn() => view('occupation'))->name('occupation');

        Route::get('/mancore', [MancoreFtmController::class, 'index'])->name('mancore.index');
        Route::get('/mancore/{id}', [MancoreFtmController::class, 'show'])->name('mancore.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
