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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');

Route::prefix('project')->group(function () {
    Route::get('/{project}', 'ProjectController@details')->name('project.details');
});

Route::prefix('user')->group(function () {
    Route::get('/{user}', 'UserController@details')->name('user.details');
});

Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::resource('permission', 'Admin\\PermissionController');
    Route::resource('role', 'Admin\\RoleController');
});