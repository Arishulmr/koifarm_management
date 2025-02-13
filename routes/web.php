<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BreederController;
use App\Http\Controllers\FishController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::prefix('ks-admin')->group(function () {
        require __DIR__ . '/auth.php';

        Route::group(['middleware' => ['auth']], function () {
            Route::get('/', [DashboardController::class, 'index']);
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('menus', MenuController::class);
        Route::resource('breeders', BreederController::class);
        Route::resource('fishes', FishController::class);


        });
    });

require __DIR__.'/auth.php';
