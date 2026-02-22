<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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


Route::get('/properties', [PropertyController::class, 'index'])
    ->middleware('auth')
    ->name('properties.index');
    
require __DIR__.'/auth.php';

use App\Models\Booking;

Route::get('/my-bookings', function () {
    $bookings = Booking::where('user_id', auth()->id())->get();
    return view('my-bookings', compact('bookings'));
})->middleware('auth')->name('my.bookings');