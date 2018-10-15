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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/authenticate', 'TestController@authenticate');
Route::get('/getLocation', 'TestController@getLocation');
Route::get('/locSuggestion', 'TestController@locSuggestion');
Route::get('/getPrice', 'TestController@getPrice');
Route::get('/createOrder', 'TestController@createOrder');
