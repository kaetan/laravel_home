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

// Index route
Route::get('/', 'PageController@welcome');

// Routes for Articles
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{id}', 'ArticlesController@show')->name('article.show');

// Routes for Questions
Route::get('/questions', 'QuestionsController@index')->name('questions.index');
Route::get('/questions/{id}', 'QuestionsController@show')->name('question.show');

// Routes for Comments
Route::post('/comments/load', 'CommentsController@getComments');
Route::post('/comment', 'CommentsController@store')->name('comment.post')->middleware('auth');

// Other routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
