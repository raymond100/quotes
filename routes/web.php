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

Route::get('/{author?}',[
	'uses' => 'QuoteController@getIndex',
	'as' => 'index']);


Route::post('/post',[
	'uses' => 'QuoteController@postQuote',
	'as' => 'create']);


Route::get('/delete/{quote_id}',[
	'uses' => 'QuoteController@deleteQuote',
	'as' => 'delete']);

