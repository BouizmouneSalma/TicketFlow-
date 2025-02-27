<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SoftwareController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('welcome');

    // Route::resource('tickets', TicketController::class);
    
    Route::get('/projects', function () {
        return view('projects');
    })->name('projects');
    
    Route::get('/reports', function () {
        return view('reports');
    })->name('reports');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
    
    Route::post('/logout', function () {
        // Logic for logout
    })->name('logout');
    
    Route::get('/documentation', function () {
        return view('documentation');
    })->name('documentation');
    Route::get('/pricing', function () {
        return view('pricing');
    })->name('pricing');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/privacy', function () {
        return view('privacy');
    })->name('privacy');

    Route::get('/terms', function () {
        return view('terms');
    })->name('terms');
Route::get('/cookies', function () {
    return view('cookies');
})->name('cookies');

// Route::get('/tickets', [SoftwareController::class, 'index'])->name('tickets.index');

Route::get('/tickets', [SoftwareController::class, 'index' ])->name('tickets.index');

// });
// });
