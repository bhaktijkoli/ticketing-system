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

Route::get('/', 'IndexController@getLogin');
Route::get('/home', 'DashboardController@getHome');


Route::prefix('api')->group(function () {
  // Authentication
  Route::post('/auth/login','Auth\LoginController@login');
  Route::get('/auth/user','Auth\UserController@getUser');
});
