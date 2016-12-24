<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/songs', 'SongsController@songs'); //get all songs

Route::get('/leaderboard', 'ScoreController@scores'); //get leaderboard

Route::post('/addscore/{score}/user/{userid}/song/{songid}', 'ScoreController@insertUserScore'); //post score to leaderboard

//Route::post('/login/{user_id}', 'UserController@checkUser');
