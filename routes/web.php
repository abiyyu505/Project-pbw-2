<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;
use App\Models\Hotel;
use App\Http\Controllers\PaymentGatewayController;


Route::get('/', function () {
    $hotels = Hotel::all();
    return view('welcome', compact('hotels'));
});

Route::get('/midtrans-test', function () {
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    return \Midtrans\Snap::getSnapToken([
        'transaction_details' => [
            'order_id' => 'TEST-' . time(),
            'gross_amount' => 10000
        ]
    ]);
});

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
