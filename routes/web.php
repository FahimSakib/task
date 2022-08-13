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



Auth::routes();

Route::get('/','TaskController@home');
Route::get('task-one','TaskController@index')->name('task.one');
Route::get('task-one-save','TaskController@create')->name('task.one.save');
Route::get('task-one-report','TaskController@report')->name('task.one.report');
Route::get('trello-auth','TrelloController@index')->name('trello.auth');
Route::post('trello-get','TrelloController@trelloAuth')->name('trello.get');
Route::get('create-board', 'TrelloController@createBoard')->name('create.board');
Route::post('board-store','TrelloController@storeBoard')->name('board.store');
Route::delete('board-delete','TrelloController@deleteBoard')->name('board.delete');
Route::get('edit-board/{id}','TrelloController@editBoard')->name('edit.board');
Route::put('update-board','TrelloController@updateBoard')->name('update.board');



