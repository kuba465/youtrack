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

Route::prefix('/project')->name('project.')->group(function () {
    Route::get('/{project}', 'ProjectController@details')->name('details');
    Route::post('/create', 'ProjectController@create')->name('create')->middleware('role:admin');
    Route::post('/edit', 'ProjectController@edit')->name('edit')->middleware('permission:edit.project');
    Route::get('/delete/{project}', 'ProjectController@delete')->name('delete')->middleware('permission:delete.project');
    Route::post('/{project}/addMember/{member?}', 'ProjectController@addMember')->name('addMember');
    Route::post('/{project}/addMemberForm', 'ProjectController@addMemberForm')->name('addMember.form');
    Route::post('/{project}/getDeleteMemberLink/{member}', 'ProjectController@getDeleteMemberLink')->name('getDeleteMemberLink');
    Route::delete('/{project}/deleteMember/{member}', 'ProjectController@deleteMember')->name('deleteMember');
});

Route::prefix('/user')->name('user.')->group(function () {
    Route::get('/{user}', 'UserController@details')->name('details');
    Route::post('/create', 'UserController@create')->name('create')->middleware('permission:create.projectMember');
    Route::post('{user}/edit', 'UserController@edit')->name('edit');
    Route::post('/{user}/editForm', 'UserController@editForm')->name('edit.form');
});

Route::prefix('/issue')->name('issue.')->group(function () {
    Route::get('/{issue}', 'IssueController@details')->name('details');
    Route::post('/{authUser}/createForm', 'IssueController@createForm')->name('createForm');
    Route::post('/ownerSelect/{project?}', 'IssueController@ownerSelect')->name('ownerSelect');
    Route::post('/create', 'IssueController@create')->name('create');
    Route::post('/{issue}/editDescription', 'IssueController@editDescription')->name('editDescription');
    Route::post('/{issue}/edit', 'IssueController@edit')->name('edit');
    Route::post('/{issue}/editForm', 'IssueController@editForm')->name('editForm');
    Route::get('/{issue}/delete', 'IssueController@delete')->name('delete');
});

Route::prefix('/admin')->middleware('role:admin')->group(function () {
    Route::resource('permission', 'Admin\\PermissionController');
    Route::resource('role', 'Admin\\RoleController');
});