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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('/item', array('as' => 'item.index', 'uses' => 'ItemController@index'));
Route::get('/item/{id}', array('as' => 'item.show', 'uses' => 'ItemController@show'));
