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

Route::get('/', function () {
    //return view('welcome');
    return view('layouts.app');
});
Route::get('/welcome', function () {
    return view('welcome');
});
// Статьи
Route::get('/articles/category/{id}','ArticleController@indexByCategory');
Route::get('/articles','ArticleController@index');
Route::get('/article/{id}','ArticleController@view');
Route::get('/article/','ArticleController@create')->middleware('auth');
Route::post('/article','ArticleController@store')->middleware('auth');

// Теги
Route::get('/tags','TagController@index');
Route::get('/tag','TagController@create')->middleware('auth');
Route::post('/tag','TagController@store')->middleware('auth');


//Категории
Route::get('/categories','CategoryController@index');
Route::get('/category','CategoryController@create');
Route::get('/category/{category}','CategoryController@edit');
Route::post('/category','CategoryController@store');
Route::delete('/category/{category}', 'CategoryController@destroy');

Route::get('/comments','CommentController@index');
Route::get('/comment','CommentController@create');


//Затычка что не реализовано
Route::get('/dummy','DummyController@index');

Auth::routes();



//  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
