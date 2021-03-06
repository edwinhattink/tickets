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



Auth::routes();

Route::group([
	'middleware' => 'auth',
], function () {
	
	Route::get('/', function () {
		return view('home');
	});
	
	Route::resources([
		'events' => 'EventController',
		'events.tickets' => 'TicketController',
	]);
	
	Route::get('events/{event}/tickets/{ticket}/download', [
		'as' => 'events.tickets.download',
		'uses' => 'TicketController@download',
	]);
	
});
