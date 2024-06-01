<?php

use App\Http\Controllers\Gateways\PaypalController;
use App\Http\Controllers\Gateways\RazorpayController;
use App\Http\Controllers\Gateways\StripeController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

require __DIR__.'/auth.php';

Route::get('/auth/redirect', function() {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function() {
    $user = Socialite::driver('github')->user();

    $user = User::firstOrCreate([
        'email' => $user->email
    ],[
        'name' => $user->name,
        'password' => bcrypt(Str::random(24))
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});

Route::post('paypal/payment', [PaypalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/success', [PaypalController::class, 'success'])->name('paypal.success');
Route::get('paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');

Route::post('stripe/payment', [StripeController::class, 'payment'])->name('stripe.payment');
Route::get('stripe/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

Route::post('razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay.payment');
Route::get('razorpay/success', [RazorpayController::class, 'success'])->name('razorpay.success');
Route::get('razorpay/cancel', [RazorpayController::class, 'cancel'])->name('razorpay.cancel');
