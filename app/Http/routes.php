<?php


// Auth
Route::group(['middleware' => ['web', 'menu']], function () {
	// Home
	Route::get('', 'HomeController@index');
	// Auth
    Route::auth();

    // Posts 
    Route::get('posts', 'PostsController@index');

    // Get Post or Page
    Route::get('read/{post}', 'PostsController@show');
});

Route::group(['middleware' => ['web', 'auth', 'menu']], function() {
	Route::get('dashboard', 'DashboardController@index');
	Route::get('admin', 'AdminController@index');
});

// @todo redirects from MPress 1.x to MPress 2.x