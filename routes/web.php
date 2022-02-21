<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UsersController::class, 'index'])->name('users');

Route::get('/posts/show/{id}', [PostsController::class, 'show']);
Route::post('/create-post', [PostsController::class, 'store'])->name('create-post');
Route::get('/post/edit/{id}', [PostsController::class, 'edit_post']);
Route::post('/update-post', [PostsController::class, 'update']);
Route::get('/post/delete/{id}', [PostsController::class, 'delete_post']);
Route::post('/delete-post', [PostsController::class, 'destroy']);

Route::get('/file', [FilesController::class, 'index'])->name('file');
Route::post('/file-upload', [FilesController::class, 'store'])->name('file-upload');


