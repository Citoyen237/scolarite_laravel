<?php

use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SchoolYearController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function(){
    route::prefix('niveaux')->group(function(){
        route::get('/', [NiveauController::class, 'index'])->name('niveau.list');
    });

    route::prefix('settings')->group(function(){
        route::get('/', [SchoolYearController::class, 'index'])->name('settings');
    });
});

require __DIR__.'/auth.php';
