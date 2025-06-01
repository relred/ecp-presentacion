<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\StateManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/large-screen', [DashboardController::class, 'largeScreen'])->name('dashboard.large');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/states', [StateManagementController::class, 'index'])->name('states.index');
        Route::put('/states', [StateManagementController::class, 'update'])->name('states.update');
    });
});

require __DIR__.'/auth.php';
