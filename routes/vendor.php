<?php


use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;

/** Vendor Route */
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');

/** Profile Route */
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile/update', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [VendorProfileController::class, 'updatePassword'])->name('password.update');

/** Vendor Shop profile Route */
Route::resource('shop-profile', VendorShopProfileController::class);
