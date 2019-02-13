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
Route::get('ticket/{id}', 'DashboardController@getHome');
Route::get('/my-tickets', 'DashboardController@getHome');
Route::get('/settings', 'DashboardController@getHome');
Route::get('/users', 'DashboardController@getHome');
Route::get('/user/{id}/edit', 'DashboardController@getHome');
Route::get('/help', 'DashboardController@getHome');
Route::get('/logout', 'Auth\LoginController@logout');

Route::prefix('api')->group(function () {
  // Authentication
  Route::post('/auth/login', 'Auth\LoginController@login');
  Route::get('/auth/user', 'Auth\UserController@getUser');
  // User
  Route::post('/user/add', 'Api\UserController@postAddUser');
  Route::post('/user/edit', 'Api\UserController@postEditUser');
  Route::get('/user/all', 'Api\UserController@getAllUsers');
  Route::get('/user/get/details/{id}', 'Api\UserController@getDetails');
  // Ticket
  Route::post('/ticket/add', 'Api\TicketController@postAddTicket');
  Route::get('/ticket/user/get', 'Api\TicketController@getUserTickets');
  Route::get('/ticket/get/unassigned', 'Api\TicketController@getUnassigned');
  Route::get('/ticket/get/details/{id}', 'Api\TicketController@getDetails');
  Route::post('/ticket/status', 'Api\TicketController@postStatus');
  // Message
  Route::post('/message/add', 'Api\MessageController@postAddMessage');
  Route::post('/message/set/read', 'Api\MessageController@postSetRead');
});
