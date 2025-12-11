<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hotel', [UserPageController::class, 'home'])->middleware(['auth', 'verified'])->name('user.main');
Route::get('/hotel-detail/{id}', [UserPageController::class, 'hotel'])->middleware(['auth', 'verified'])->name('hotel.detail');

Route::post('/search-hotels', [UserPageController::class, 'search'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
