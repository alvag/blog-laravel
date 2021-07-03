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

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home');

// Route::resource('posts', 'PostController')->except('index');

Route::get('home', 'HomeController@index');


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')->group(function () {
        Route::get('posts', 'PostController@index')->name('admin.posts.index');
    });
