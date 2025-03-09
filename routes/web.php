<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\developper;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'CheckRole:client'])->group(function () {
    Route::get('/support', [TicketController::class, 'show']);
});

Route::middleware(['auth', 'CheckRole:admin'])->group(function () {
    Route::get('/admin', [TicketController::class, 'showAllTickets']);
});

Route::middleware(['auth', 'CheckRole:developper'])->group(function () {
    Route::get('/developper', [developper::class, 'index'])->name('developer.dashboard');
    Route::post('/developper/update-status', [developper::class, 'updateStatus'])->name('developer.updateStatus');
});

Route::post('/addTicket', [TicketController::class, 'addTicket'])->name('Support.addTicket');
Route::post('/assignTicket', [developper::class, 'assign'])->name('admin.assignTicket');



require __DIR__.'/auth.php';
