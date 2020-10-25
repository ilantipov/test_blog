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

Route::pattern('id', '[0-9]+');

Route::get('/','ArticleController@index');

// Статьи
Route::get('/articles/category/{id}','ArticleController@indexByCategory');
Route::get('/articles/user/{id}','ArticleController@indexByUser');
Route::get('/articles','ArticleController@index');
Route::get('/articles/admin','ArticleController@indexAdmin');
Route::get('/article/{id}','ArticleController@view');
Route::get('/article/','ArticleController@create')->middleware('auth');
Route::get('/article/edit/{id}','ArticleController@edit')->middleware('auth');
Route::get('/article/like/{id}','ArticleController@like')->middleware('auth');
Route::post('/article','ArticleController@store')->middleware('auth');

Route::get('/article/switchPublishedState/{id}','ArticleController@switchPublishedSate')->middleware('auth');
Route::get('/article/switchTrashedState/{id}','ArticleController@switchTrashedState')->middleware('auth');

// Теги
Route::get('/tags','TagController@index');
Route::get('/tag','TagController@create')->middleware('auth');
Route::post('/tag','TagController@store')->middleware('auth');


//Категории
Route::get('/categories','CategoryController@index');
Route::get('/category','CategoryController@create');
Route::get('/category/edit/{category}','CategoryController@edit');
Route::post('/category','CategoryController@store');
Route::get('/category/delete/{category}', 'CategoryController@delete');

Route::get('/comments','CommentController@index');
Route::get('/comment/changeModerationState/{id}','CommentController@changeModerationState')->middleware('auth');
Route::post('/comment/create','CommentController@create')->middleware('auth');
Route::get('/comment/delete/{id}','CommentController@delete')->middleware('auth');

Route::post('/uploader/upload','ArtictesBodyImageUploadController@store')->middleware('auth');
Route::post('/uploader/delete','ArtictesBodyImageUploadController@delete')->middleware('auth');


//Затычка что не реализовано
Route::get('/dummy','DummyController@index');

Auth::routes();



//  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//    return view('layouts.app');
//})->name('layouts.app');
