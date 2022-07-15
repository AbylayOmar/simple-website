<?php

use Illuminate\Support\Facades\Route;

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
    return view('main');
})->name('main');

Auth::routes(['register' => false]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('/{Category:slug}', [App\Http\Controllers\CategoryController::class, 'show_by_slug'])->name('categories.show_by_slug');
Route::resource('/categories', App\Http\Controllers\CategoryController::class);
Route::resource('/posts', App\Http\Controllers\PostController::class);