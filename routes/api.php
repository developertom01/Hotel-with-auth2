<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rooms','RoomController@index')->name('tasks.all');
Route::post('/rooms','RoomController@store')->name('tasks.store');
Route::get('/rooms/{id}','RoomController@show')->name('tasks.show');
Route::put('/rooms/{id}','RoomController@update')->name('task.update');
Route::delete('/rooms/{id}','RoomController@delete')->name('task.delete');

