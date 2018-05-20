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

Route::get('/', ['as' => 'main', 'uses' => 'TasksController@index']);

Route::get('/create', ['as' => 'create-task', 'uses' =>'TasksController@create']);

Route::post('/store', ['as' => 'store-task', 'uses' => 'TasksController@store']);

Route::get('/edit/{id}', ['as' => 'edit-task', 'uses' => 'TasksController@edit']);

Route::put('/update/{id}', ['as' => 'update-task', 'uses' => 'TasksController@update']);

Route::get('/delete/{id}',  ['as' => 'delete-task', 'uses' => 'TasksController@destroy']);

Route::get('/changeStatus/{id}/{status}', ['as' => 'change-status', 'uses' => 'TasksController@changeStatus']);

Route::get('/sort/{sortBy}', ['as' => 'sort', 'uses' => 'TasksController@sort']);

Route::get('/hide', ['as' => 'hide', 'uses' => 'TasksController@hide']);