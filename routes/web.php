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

Route::post('/upload', 'UploadController@save')->middleware('auth');

// Articles
Route::get('/articles', 'ArticleController@index')->name('articles');
Route::get('/article/{article}', 'ArticleController@show');
Route::get('/article/edit/{article}', 'ArticleController@edit');
Route::post('/article/edit/{article}', 'ArticleController@update');
Route::get('/articles/create', 'ArticleController@create')->name('create-article');
Route::post('/articles/create', 'ArticleController@save')->name('save-article');

// Streamers
Route::get('/streamers', 'StreamerController@show');
Route::get('/streamers/create', 'StreamerController@create')->name('create-streamer');
Route::post('/streamers/create', 'StreamerController@save')->name('save-streamer');

// Tags
Route::get('/tag/{tag}', 'TagController@show');
Route::get('/tags/create', 'TagController@create')->name('create-tag');
Route::get('/tags', 'TagController@read')->name('get-tags');
Route::post('/tags/create', 'TagController@save')->name('save-tag');