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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
Route::get('add_user', 'UserController@create');
Route::post('user-store', 'UserController@store');
Route::get('user_list', 'UserController@index');
Route::post('user-list', 'UserController@ajax');
Route::get('delete-user/{id}', 'UserController@destroy');
Route::get('user_edit/{id}', 'UserController@edit');
Route::post('user_upadate', 'UserController@update');
});

