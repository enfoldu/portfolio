<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Dashboard
Route::get('/', 'DashboardController@index')->name('dashboard');

// Users
Route::get('/users/{id?}', 'UserController@index')->name('users');
Route::patch('/users/{id}', 'UserController@patch')->name('users.patch');
Route::delete('/users/{id}', 'UserController@delete')->name('users.delete');

// Users > User
//Route::get('users/{id}', 'UserController@show')->name('users.show');

// Roles
Route::get('/roles/{id?}', 'RoleController@index')->name('roles');
Route::patch('/roles/{id}', 'RoleController@patch')->name('roles.patch');
Route::delete('/roles/{id}', 'RoleController@delete')->name('roles.delete');

// Settings
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::post('/settings', 'SettingsController@update')->name('settings.post');

// Auth
Auth::routes();