<?php


// Auth
Route::group(['middleware' => ['web', 'menu']], function () {
	Route::get('/', 'HomeController@index');

    Route::auth();
});

Route::group(['middleware' => ['web', 'auth', 'menu']], function() {
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/admin', 'AdminController@index');

});
