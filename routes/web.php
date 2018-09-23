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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{provider}', 'Auth\SocialAccountController@redirectToProvider');

Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::get('posts', 'PostController@index')->name('posts');

Route::get('post/create', 'PostController@create')->name('posts.create');

Route::post('post', 'PostController@store')->name('posts.store');

Route::get('post/{id}', 'PostController@show')->name('posts.show');

Route::get('post/edit/{id}', 'PostController@edit')->name('posts.edit');

Route::get('post/update/{id}', 'PostController@update')->name('posts.update');

Route::post('post/{id}', 'PostController@destroy')->name('posts.destroy');

//Route::get('posts/search', 'PostController@search')->name('posts.search');

Route::get('posts/search', 'PostController@searchJs')->name('posts.search');

