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
App::missing(function($exception)
{
    return Response::view('pages/404', array(), 404);
});
Route::get('/', "PageController@home");
Route::get('/shorten',function(){
	return Response::view('pages/404', array(), 404);
});
Route::post('/shorten', "PageController@shorten");
Route::get('/r/{hash?}', "PageController@redirect");
