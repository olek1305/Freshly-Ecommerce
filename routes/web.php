<?php

use App\DataTables\UsersDataTable;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

Route::get('user/{id}/edit', function ($id) {
   return $id;
})->name('user.edit');

Route::get('/dashboard', function (UsersDataTable $dataTable) {
    return $dataTable->render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/image', function () {
    $manager = new ImageManager(new Driver());
    $image = $manager->read('car.jpg');
    $image->resize(1001, 1001);
    $image = $image->blur(20);
    $image->save('car.jpg');
});

Route::get('shop', [CartController::class, 'shop'])->name('shop');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{product_id}', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('qty-increment/{rowId}', [CartController::class, 'qtyIncrement'])->name('qtyIncrement');
Route::get('qty-decrement/{rowId}', [CartController::class, 'qtyDecrement'])->name('qtyDecrement');
Route::get('remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('removeProduct');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('create-role', function() {
//    $role = Role::create(['name' => 'publisher']);
//
//    return $role;

//    $permission = Permission::create(['name' => 'edit articles']);
//
//    return $permission;

    $user = auth()->user();
//    $user->assignRole('writer');
//    $user->givePermissionTo('edit articles');



    if($user->can('edit articles')) {
        return 'user have permission';
    } else {
        return 'user dont have permission';
    }

});

require __DIR__.'/auth.php';
