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

Route::get('/', function () {
    //return view('welcome');
    return view('layouts.app');
});
Route::get('/welcome', function () {
    return view('welcome');
});
// Статьи
Route::get('/articles','ArticleController@index');
Route::get('/article','ArticleController@create');
Route::post('/article','ArticleController@store');
// Теги
Route::get('/tags','TagController@index');
Route::get('/tag','TagController@create');
Route::post('/tag','TagController@store');


//Auth::routes();
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


//  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
