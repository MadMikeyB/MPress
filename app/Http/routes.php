<?php

// Admin
Route::group(['middleware' => ['web', 'auth', 'menu', 'admin']], function() {

    Route::get('admin', 'AdminController@index');
    Route::get('admin/posts', 'AdminController@posts');
    Route::get('admin/pages', 'AdminController@pages');
    Route::get('admin/comments', 'AdminController@comments');
    Route::get('admin/users', 'AdminController@users');
    Route::get('admin/settings', 'AdminController@settings');
    Route::post('admin/settings', 'AdminController@storeSettings');

    Route::get('admin/tools', 'AdminController@tools');
    Route::get('admin/menus', 'AdminController@menus');

    Route::post('admin/menus', 'AdminController@storeMenu');
    
    Route::get('posts/create', 'PostsController@create');
    Route::post('posts', 'PostsController@store');

    Route::get('pages/create', 'AdminController@createPage');
    Route::post('pages', 'AdminController@storePage');

});

// Auth
Route::group(['middleware' => ['web', 'menu']], function () {
	// @todo dynamically set home page through settings 
    // Home
    	Route::get('', 'HomeController@index');
    	Route::get('home', function(){
    		return redirect()->action('HomeController@index');
    	});
        Route::get('dashboard', 'DashboardController@index');
	
    // Auth
        Route::auth();

    // Posts 
        Route::get('posts', 'PostsController@index');
        
        // Edit Post
        Route::get('posts/{post}/edit', 'PostsController@edit');
        
        // Add Images to Post
        Route::post('posts/{post}/images', 'PostsController@storeImage');

        // Update Post
        Route::patch('posts/{post}', 'PostsController@update');

        // Get Post
        Route::get('read/{post}', 'PostsController@show');

        // Delete Post
        Route::delete('posts/{post}/delete', 'PostsController@destroy');

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




Route::group(['middleware' => ['web', 'menu']], function()
{
    // View Page
    Route::get('{page?}', 'PagesController@show');
});

// @todo redirects from MPress 1.x to MPress 2.x
