<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'client'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

    Route::get('/my-bookings', function () {
        $bookings = Booking::where('user_id', auth()->id())->get();
        return view('my-bookings', compact('bookings'));
    })->name('my.bookings');

    Route::get('/profile/edit-form', function () {
        return view('profile.edit-form');
    })->name('profile.edit.form');
});

require __DIR__.'/auth.php';
