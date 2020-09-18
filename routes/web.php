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
Route::get('/tremlo', 'PageController@tremlo');
Route::view('/test', 'test');

// Routes for Articles
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{id}', 'ArticlesController@show')->name('article.show');
Route::post('/articles/{id}/edit', 'ArticlesController@update')->name('article.update');

// Routes for Questions
Route::get('/questions', 'QuestionsController@index')->name('questions.index');
Route::get('/questions/{id}', 'QuestionsController@show')->name('question.show');
Route::post('/questions/{id}/edit', 'QuestionsController@update')->name('question.update');

// Routes for Comments
Route::post('/comments/load', 'CommentsController@getComments');
Route::post('/comment', 'CommentsController@store')->name('comment.post')->middleware('auth');

// Routes for Parsing
Route::get('/parsing', 'ParsingController@index')->name('parsing.index');
Route::post('/parsing', 'ParsingController@parse')->name('parsing.parse');
//Route::get('/parse-soups', 'ParsingController@parseSoups');

// Other routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/watermark', 'ImagePkController@applyWm');
Route::get('/do-math', 'MathsController@doMathFromWeb');
