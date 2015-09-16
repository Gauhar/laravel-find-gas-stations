<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', 'PageController@about');
Route::get('/',
    ['as' => 'contact', 'uses' => 'PageController@create']);
Route::post('/',
    ['as' => 'contact_store', 'uses' => 'PageController@store']);

//Route::post('/',
//    ['as' => 'station_list', 'uses' => 'PageController@filter']);
//Route::post('gas-list', 'PageController@gas_list');
//
//Route::get('gas-list', 'PageController@gas_list');

Route::get('station-details/{place_id}', 'PageController@view_gas_station_details');


Route::post('testing', 'PageController@testing');
