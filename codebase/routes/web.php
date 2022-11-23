<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RssUrlController;
use App\Http\Controllers\PostController;

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

Route::get('/', [App\Http\Controllers\RssUrlController::class, 'index'])->name('home');

Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('urls', RssUrlController::class);
Route::resource('posts', PostController::class)->only([
    'index',
]);

Route::get('/posts/fetch', [PostController::class, 'fetch'])->name('fetch');
