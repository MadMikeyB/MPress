<?php

// Are we installed?
if ( ! file_exists(storage_path('installed')) )
{    
    Route::get('/', function()
    {
        return redirect()->to('/install');
    });
} 
else
{

// Admin
Route::group(['middleware' => ['web', 'auth', 'menu', 'admin']], function() {

    Route::get('admin', 'Admin\Controller@index');

    Route::get('admin/posts', 'Admin\PostsController@index');
    Route::get('admin/posts/create', 'Admin\PostsController@create');
    Route::post('admin/posts', 'Admin\PostsController@store');

    Route::get('admin/pages', 'Admin\PagesController@index');
    Route::get('admin/pages/create', 'Admin\PagesController@create');
    Route::post('admin/pages', 'Admin\PagesController@store');

    Route::get('admin/comments', 'Admin\CommentsController@index');

    Route::get('admin/users', 'Admin\UsersController@index');

    Route::get('admin/menus', 'Admin\MenusController@index');
    Route::post('admin/menus', 'Admin\MenusController@store');

    Route::get('admin/settings', 'Admin\SettingsController@index');
    Route::post('admin/settings', 'Admin\SettingsController@store');

    Route::get('admin/editor', 'Admin\ThemesController@index');
    Route::get('admin/editor/{theme?}', 'Admin\ThemesController@index');
    Route::get('admin/editor/edit/{path?}', 'Admin\ThemesController@view')->where('path', '(.*)');

    Route::get('admin/plugins', 'Admin\PluginsController@index');




});



// Auth
Route::group(['middleware' => ['web', 'menu']], function () {
    // Home
        $home = Setting::get('home_page', 'default');

        if ( $home === 'default') 
        {
            Route::get('', 'HomeController@index');
        }
        else
        {
            Route::get('', function()
            {
                \Theme::init( Setting::get('theme_name') );   
                $page = App\Page::where( 'slug', '=', Setting::get('home_page') )->first();
                Event::fire(new App\Events\PageWasViewed($page));

                $page->content = Markdown::convertToHtml($page->content);
                return view('pages.show', compact('page'));
            });
        }

    	Route::get('home', function(){
    		return redirect()->action('HomeController@index');
    	});
        
        Route::get('dashboard', 'DashboardController@index');
        Route::get('sendemail', function()
        {
            Mail::raw('Laravel with Mailgun is easy!', function($message)
            {
                $message->to('me@mikeylicio.us')->subject('Hiya!');
            });

            return "Mail sent";
        });
	
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
        Route::get('article/{post}', function($post) {
        	return redirect()->to('read/' . $post->slug);
        });

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
        Route::get('@{user}/edit', 'ProfileController@edit')->middleware('auth');
        // Update Profile
        Route::patch('@{user}', 'ProfileController@update');
        // Deactivate Profile
        Route::get('@{user}/deactivate', 'ProfileContoller@deactivate');
        // Delete Profile
        Route::delete('@{user}/delete', 'ProfileController@destroy');
});




Route::group(['middleware' => ['web', 'menu']], function()
{
	// Pages
	    // View Page
	    Route::get('{page?}', 'PagesController@show');
	    // Delete Page
	    Route::delete('pages/{page}/delete', 'PagesController@destroy');
});

}

// @todo redirects from MPress 1.x to MPress 2.x
