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

Route::get('/', 'ArticlesController@index')->name('home');
Route::get('/articles/{id}', 'ArticlesController@show')->name('article.show');
Route::post('/comment', 'CommentsController@store')->name('comment.post');

Auth::routes();

Route::get('/home', 'ArticlesController@index')->name('home');

Route::get('/articles/{id}/{offset}', 'ArticlesController@load')->name('article.load');
