<?php


use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use Illuminate\Support\Facades\Route;

/** Vendor Routes */
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');

/** Profile Routes */
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile/update', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [VendorProfileController::class, 'updatePassword'])->name('password.update');
