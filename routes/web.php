<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
//use Illuminate\Support\Facades\RateLimiter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);
Route::fallback(function () {
    return view('fallback');
});
//RateLimiter::for('/', function (Request $request) {
//    return $request->user()
//        ? Limit::perMinute(10)->by($request->user()->id)
//        : Limit::perMinute(10)->by($request->ip());
//});



Auth::routes();


Route::view('/posts/create', 'posts.create');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('/posts/{post}', [CommentController::class, 'store']);

