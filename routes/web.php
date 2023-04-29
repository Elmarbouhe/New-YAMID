<?php

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



Route::get('/', 'HomeController@index') -> name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () {
Route::get('/dashboard', function () {return redirect('/');});});

Route::resource('categorys', CategoryController::class);
Route::resource('posts', PostController::class);
Route::get('/category/{category}', 'HomeController@showByCategory')->name('category.posts');

