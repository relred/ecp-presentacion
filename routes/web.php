<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MunicipalityDashboardController;
use App\Http\Controllers\Admin\StateManagementController;
use App\Http\Controllers\Admin\MunicipalityManagementController;
use Illuminate\Support\Facades\Route;

// Public Dashboards
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/large-screen', [DashboardController::class, 'largeScreen'])->name('dashboard.large');

Route::get('/municipalities', [MunicipalityDashboardController::class, 'index'])->name('municipalities.dashboard');
Route::get('/municipalities/large-screen', [MunicipalityDashboardController::class, 'largeScreen'])->name('municipalities.dashboard.large');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // States Management
        Route::get('/states', [StateManagementController::class, 'index'])->name('states.index');
        Route::put('/states', [StateManagementController::class, 'update'])->name('states.update');

        // Municipalities Management
        Route::get('/municipalities', [MunicipalityManagementController::class, 'index'])->name('municipalities.index');
        Route::put('/municipalities', [MunicipalityManagementController::class, 'update'])->name('municipalities.update');
    });
});

require __DIR__.'/auth.php';
