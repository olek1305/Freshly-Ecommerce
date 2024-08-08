<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

/** Flash Sale routes */
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flashSale.index');

/** Product detail routes */
Route::get('product-detail/{slug}', [FrontendProductController::class, 'showProduct'])->name('product-detail');

/** Cart Routes */
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart/detail', [CartController::class, 'cartDetail'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('cart/products', [CartController::class, 'getCartProducts'])->name('cart.products');
Route::post('cart/remove-sidebar-product', [CartController::class, 'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-subtotal', [CartController::class, 'cartTotal'])->name('cart.sidebar-product-subtotal');

/** Coupon routes */
Route::get('coupon/apply', [CouponController::class, 'couponApply'])->name('coupon.apply');
Route::get('coupon/calculation', [CouponController::class, 'couponCalculation'])->name('coupon.calculation');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update/password', [UserProfileController::class, 'updatePassword'])->name('password.update');

    /** User address routes */
    Route::resource('address', UserAddressController::class);

    /** Checkout routes */
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout/address/create', [CheckoutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');

    /** Payment Routes */
    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
});
