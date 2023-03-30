<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//initial route for welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

//made route for items through controller resource 
Route :: resource('product',ProductController::class);
//Did not specified any function in ItemController .default 'index' function will be accesed


//for edit dont need to specify the below code.this is optional
Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/about', function () {
    return view('product.about');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
