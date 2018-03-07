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
Auth::routes();

// Home
Route::get('/', 'HomeController@index')->name('home');

// Articles
Route::get('/articles', 'ArticleController@index')->name('articles');
Route::get('/articles/create', 'ArticleController@create')->name('create-article');
Route::post('/articles/create', 'ArticleController@save')->name('save-article');

// Streamers
Route::get('/streamers/create', 'StreamerController@create')->name('create-streamer');
Route::post('/streamers/create', 'StreamerController@save')->name('save-streamer');

// Tags
Route::get('/tags/create', 'TagController@create')->name('create-tag');
Route::post('/tags/create', 'TagController@save')->name('save-tag');