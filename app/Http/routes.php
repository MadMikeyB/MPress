<?php


// Auth
Route::group(['middleware' => 'web'], function () {
	// DashboardController has Auth middleware in __construct.
	Route::get('/', 'HomeController@index');

    Route::auth();

    Route::get('/dashboard', 'DashboardController@index');
});
