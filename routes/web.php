<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;
use App\Models\Hotel;
use App\Http\Controllers\PaymentGatewayController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    $hotels = Hotel::all();
    if (Auth::check()) {
        return redirect()->route('user.main');
    }
    return view('welcome', compact('hotels'));
});


Route::post('/midtrans/notification', [PaymentGatewayController::class, 'notification']);
Route::get('/hotel/map/{id}', [UserPageController::class, 'map'])->middleware(['auth', 'verified'])->name('hotel.map');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hotel', [UserPageController::class, 'home'])->middleware(['auth', 'verified'])->name('user.main');
Route::get('/hotel-detail/{id}', [UserPageController::class, 'hotel'])->middleware(['auth', 'verified'])->name('hotel.detail');

Route::post('/search-hotels', [UserPageController::class, 'search'])->middleware(['auth', 'verified']);

// payment gateway
Route::post('/payment/midtrans-callback', [PaymentGatewayController::class, 'callback']);
Route::post('/payment/pay', [PaymentGatewayController::class, 'pay'])->name('payment.pay');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
