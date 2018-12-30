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

Route::get('/', 'IndexController@getLogin')->name('login');
Route::get('/home', 'DashboardController@getHome');
Route::get('/new-ticket', 'DashboardController@getHome');
Route::get('/ticket', 'DashboardController@getHome');
Route::get('/mytickets', 'DashboardController@getHome');
Route::get('/users', 'DashboardController@getHome');
Route::get('/help', 'DashboardController@getHome');
Route::get('/logout', 'Auth\LoginController@logout');

Route::prefix('api')->group(function () {
  // Authentication
  Route::post('/auth/login', 'Auth\LoginController@login');
  Route::get('/auth/user', 'Auth\UserController@getUser');
  // User
  Route::post('/user/add', 'Api\UserController@postAddUser');
  Route::get('/user/all', 'Api\UserController@getAllUsers');
  // Ticket
  Route::post('/ticket/add', 'Api\TicketController@postAddTicket');
  Route::get('/ticket/get/unassigned', 'Api\TicketController@getUnassigned');
});
