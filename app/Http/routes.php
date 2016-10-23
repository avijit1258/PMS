<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'ProjectUserController@showing_add_request');

Route::resource('projects', 'ProjectController');

Route::get('/projects/{id}/dashboard', 'ProjectController@dashboard');

Route::resource('project_users', 'ProjectUserController');
Route::put('/project_users/{id}/confirm', 'ProjectUserController@confirm');

Route::get('/project_user/{id}/all_user', 'ProjectUserController@all_user');

Route::resource('tasks', 'TaskController');

Route::get('/tasks/create/{id}', 'TaskController@create');

//Route::get('/{{id}}/dashboard', 'ProjectController@dashboard');
