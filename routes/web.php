<?php

use App\Http\Controllers\PostController;
use App\Mail\OrderShipped;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::group(['middleware' => 'authCheck'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/profile', function() {
        return view('profile');
    });
});

Route::get('/posts/trash', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.force_delete');

Route::resource('posts', PostController::class);

Route::get('/unavailable', function() {
    return view('unavailable');
})->name('unavailable');

Route::get('contact', function() {
    $posts = Post::all();
    return view('contact', compact('posts'));
});

Route::get('send-mail', function() {
//    Mail::raw('this is a test mail' , function($message) {
//        $message->to('test@gmail.com')->subject('hi this is a test mail');
//    });

    Mail::send(new OrderShipped);
    dd('success');
});

Route::get('get-session', function (Request $request) {
//    $data = session()->all();

        $data = $request->session()->all();
//        $data = $request->session()->get('_token');

    dd($data);
});

Route::get('save-session', function (Request $request) {
//    $data = $request->session()->put('user_status', 'logged_in');
    session(['user_ip' => $request->ip()]);
    return redirect('get-session');
});

Route::get('destroy-session', function (Request $request) {
//    $request->session()->forget('user_ip');
    $request->session()->flush();

    return redirect('get-session');
});

Route::get('flash-session', function (Request $request) {
    $request->session()->flash('status', 'true');
    return redirect('get-session');
});
