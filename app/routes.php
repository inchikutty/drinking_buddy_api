<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', ['uses' => 'HomeController@showWelcome']);
Route::post('/api/v1/{id}/x={val1}/y={val2}/z={val3}/time={time}/date={date}/color={color}', ['uses'=> 'HomeController@postToDB'] );
Route::get('/api/delete/action={action}/table={table}', ['uses' => 'HomeController@deleteByObservedAction']);
Route::get('/api/v1/{id}', ['uses'=> 'HomeController@getData'] );
