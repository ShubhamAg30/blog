<?php

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

Route::get('/', "BlogController@index");

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile'); 

    Route::get("/blog_list", "BlogController@list")->name("blog_list");
    Route::get("/blog_add", "BlogController@add")->name("blog_add");
    Route::post("/blog_add", "BlogController@add");
});
