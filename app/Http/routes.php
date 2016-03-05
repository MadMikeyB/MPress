<?php


// Auth
Route::group(['middleware' => ['web', 'menu']], function () {
	// Home
	Route::get('', 'HomeController@index');
	Route::get('home', function(){
		return redirect()->action('HomeController@index');
	});
	// Auth
    Route::auth();

    // Posts 
    Route::get('posts', 'PostsController@index');
    // Route::group(['middleware' => ['admin']], function() {
        // Create Post
        Route::get('posts/create', 'PostsController@create');     // @TODO store post CRUD within 'Admin' Middleware
    // });

    // Edit Post
    Route::get('posts/{slug}/edit', 'PostsController@edit');     // @TODO store post CRUD within 'Admin' Middleware

    // Update Post
    Route::patch('posts/{slug}', 'PostsController@update');     // @TODO store post CRUD within 'Admin' Middleware

    // Store Post
    Route::post('posts', 'PostsController@store');     // @TODO store post CRUD within 'Admin' Middleware

    // Delete Post
    Route::delete('posts/{slug}/delete', 'PostsController@destroy');     // @TODO store post CRUD within 'Admin' Middleware


    // Store Comment
    Route::post('posts/{slug}/comments', 'CommentsController@store');

    Route::get('posts/{slug}', function()
    {
        return redirect()->action('PostsController@show');
    });

    // Edit Comment
    Route::get('comments/{comment}/edit', 'CommentsController@edit');

    // Update Comment
    Route::patch('comments/{comment}', 'CommentsController@update');

    // Delete Comment
    Route::delete('comments/{comment}/delete', 'CommentsController@destroy');

    // Get Post or Page
    Route::get('read/{slug}', 'PostsController@show');
});

Route::group(['middleware' => ['web', 'auth', 'menu']], function() {
	Route::get('dashboard', 'DashboardController@index');
	Route::get('admin', 'AdminController@index');
});

// @todo redirects from MPress 1.x to MPress 2.x