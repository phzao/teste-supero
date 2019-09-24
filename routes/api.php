<?php

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
Route::middleware(['cors', 'api'])->group(function () {
    Route::group(['prefix'=>'v1'], function (){
        Route::get('tasks/{id}', 'TaskController@show');
        Route::get('tasks', 'TaskController@index');
        Route::get('tasks-all', 'TaskController@indexWithTrashed');
        Route::put('tasks/{id}', 'TaskController@update');
        Route::put('tasks/{id}/open', 'TaskController@setOpen');
        Route::put('tasks/{id}/done', 'TaskController@setDone');
        Route::post('tasks', 'TaskController@store');
        Route::delete('tasks/{id}', 'TaskController@destroy');
    });
});
