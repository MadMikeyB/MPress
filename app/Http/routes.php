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
        Route::get('posts/{post}/edit', 'PostsController@edit');     // @TODO store post CRUD within 'Admin' Middleware

        // Update Post
        Route::patch('posts/{post}', 'PostsController@update');     // @TODO store post CRUD within 'Admin' Middleware

        // Store Post
        Route::post('posts', 'PostsController@store');     // @TODO store post CRUD within 'Admin' Middleware

        // Delete Post
        Route::delete('posts/{post}/delete', 'PostsController@destroy');     // @TODO store post CRUD within 'Admin' Middleware

        // Get Post
        Route::get('read/{post}', 'PostsController@show');
    
    // Comments
        // Store Comment
        Route::post('posts/{post}/comments', 'CommentsController@store');

        Route::get('posts/{post}', function()
        {
            return redirect()->action('PostsController@show');
        });

        // Edit Comment
        Route::get('comments/{comment}/edit', 'CommentsController@edit');

        // Update Comment
        Route::patch('comments/{comment}', 'CommentsController@update');

        // Delete Comment
        Route::delete('comments/{comment}/delete', 'CommentsController@destroy');

    // Profiles
        // Show Profile
        Route::get('@{user}', 'ProfileController@show');
        // Edit Profile
        Route::get('@{user}/edit', 'ProfileController@edit');
        // Update Profile
        Route::patch('@{user}', 'ProfileController@update');
        // Deactivate Profile
        Route::get('@{user}/deactivate', 'ProfileContoller@deactivate');
        // Delete Profile
        Route::delete('@{user}/delete', 'ProfileController@destroy');
});

Route::group(['middleware' => ['web', 'auth', 'menu']], function() {
	Route::get('dashboard', 'DashboardController@index');
	Route::get('admin', 'AdminController@index');
});


Route::group(['middleware' => ['web', 'menu']], function()
{
    // Add Page

    // View Page
    Route::get('{page?}', 'PagesController@show');
});

// @todo redirects from MPress 1.x to MPress 2.x
