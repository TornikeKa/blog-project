<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
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

Auth::routes();


Route::get('/settings/{user}', [UserController::class, 'show']);
Route::patch('/settings/{user}', [UserController::class, 'update']);

Route::view('/contacts', 'contacts.show');

Route::resource('/posts', PostController::class);

Route::post('/posts/search', [SearchController::class, 'searchPost']);

Route::post('/posts/{post}', [CommentController::class, 'store']);
