<?php

use Illuminate\Support\Facades\Route;

/**
 * The app has no public landing page. Guests are sent to the login screen;
 * Fortify's `guest` middleware bounces authenticated users on to the dashboard.
 */
Route::redirect('/', '/login')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
