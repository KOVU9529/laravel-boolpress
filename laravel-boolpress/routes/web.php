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



Auth::routes();

Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function(){
    //route per gestire la home dell'admin
    Route::get('/','Homecontroller@index')-> name('home');
    //routes per gestire le crud posts
    Route::resource('posts','PostController');
    //routes per gestire le crud categories 
    Route::resource('categories','CategoryController');

    
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any','.*');
