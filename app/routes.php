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
Route::post('/api/v1/{id}/x={val1}/y={val2}/z={val3}/time={time}/date={date}', ['uses'=> 'HomeController@postToDB'] );
Route::get('/api/v1/{id}', ['uses'=> 'HomeController@getData'] );
Route::post('/api/v1/user:{username}/firstname:{fn}/lastname:{ln}', ['uses'=> 'HomeController@addUser'] );
Route::post('/api/v1/user_id:{user}/action:{action}/color:{color}/sensor:{sensor}/x:{val1}/y:{val2}/z:{val3}/time:{timenow}',['uses'=> 'HomeController@observation']);
Route::post('api/v1/data',[ 'uses' => 'HomeController@data']);
Route::post('api/v1/dataNew',[ 'uses' => 'HomeController@dataNew']);
