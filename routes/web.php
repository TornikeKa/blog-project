<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
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
Route::view('/posts/create', 'posts.create');
Route::view('/posts/delete', 'posts.delete');
Route::view('/contacts', 'contacts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::patch('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}',[PostController::class, 'delete']);



Route::post('/posts/{post}', [CommentController::class, 'store']);
