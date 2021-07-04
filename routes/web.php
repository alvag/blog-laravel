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

Route::get('blog/{id}', 'PostsController@show');



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')->group(function () {
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('posts', 'PostController@index')->name('admin.posts.index');
        Route::get('posts/create', 'PostController@create')->name('admin.posts.create');
        Route::post('posts', 'PostController@store')->name('admin.posts.store');
    });
