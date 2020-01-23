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


Route::post('register', 'API\UserController@signUp');
Route::post('login', 'API\UserController@signIn');
Route::post('logout', 'API\UserController@signOut')->middleware('auth:api');

Route::apiResource('threads', 'API\ThreadController');
Route::apiResource('replies', 'API\ThreadController');

Route::get('/users', function () {
    return \App\User::all();
});
