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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('/project')->group(function () {
    Route::get('/{project}', 'ProjectController@details')->name('project.details');
    Route::post('/create', 'ProjectController@create')->name('project.create')->middleware('role:admin');
    Route::post('/edit', 'ProjectController@edit')->name('project.edit')->middleware('permission:edit.project');
    Route::get('/delete/{project}', 'ProjectController@delete')->name('project.delete')->middleware('permission:delete.project');
    Route::post('/{project}/addMember/{member?}', 'ProjectController@addMember')->name('project.addMember');
    Route::post('/{project}/addMemberForm', 'ProjectController@addMemberForm')->name('project.addMember.form');
    Route::post('/{project}/getDeleteMemberLink/{member}', 'ProjectController@getDeleteMemberLink')->name('project.getDeleteMemberLink');
    Route::delete('/{project}/deleteMember/{member}', 'ProjectController@deleteMember')->name('project.deleteMember');
});

Route::prefix('/user')->group(function () {
    Route::get('/{user}', 'UserController@details')->name('user.details');
    Route::post('/create', 'UserController@create')->name('user.create')->middleware('role:admin');
    Route::post('{user}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/{user}/editForm', 'UserController@editForm')->name('user.edit.form');
});

Route::prefix('/issue')->group(function () {
    Route::get('/{issue}', 'IssueController@details')->name('issue.details');
    Route::post('/create', 'IssueController@create')->name('issue.create');
});

Route::middleware('role:admin')->prefix('/admin')->group(function () {
    Route::resource('permission', 'Admin\\PermissionController');
    Route::resource('role', 'Admin\\RoleController');
});