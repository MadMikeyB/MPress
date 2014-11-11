<?php

/*
 * GET's
 */

/**
 * Installer Routes - Go at top of file so they're initialized first.
 */
// installer unlocked - need to install site.
if ( @!file_get_contents( __DIR__ . '/storage/installer_lock.txt' ) )
{
	Route::get( '/', function () {
		return Redirect::to('install');
	} );
}
else
{
	// we're installed. Enable homepage.
	Route::get('/', 'PostController@index');
}

// installer locked - no access for security reasons

if ( @!file_get_contents( __DIR__ . '/storage/installer_lock.txt' ) )
{
	Route::controller('install', 'InstallController');
}
/**
 * End Installer
 */

// show login form
Route::get('login', 'UserController@showLogin');

// password reminder
Route::get('password/remind', function() {
	$menu = Menu::generateMenu();
	View::share('menu', $menu);
	return View::make('lostpass');
});

// archive
Route::get('archives/{category?}', 'PostController@showArchives');

// author
Route::get('author/{author?}', 'PostController@showArchivesByAuthor');

// view post
Route::get('article/{id}', 'PostController@showPost');

 Route::get('random/{slug}', function($post) {
 	 $post = preg_replace('#[0-9]#', '', $post); // get rid of wordpress ID
 	 $post = rtrim($post, '-'); // trim trailing dash
 	 $post = Post::findBySlug($post);
	 if ( !$post )
	 {
		 return App::abort(404);
	 }
	 return View::make('viewpost')->with('post', $post);
 });

// edit post
Route::get('admin/edit/{id}', 'PostController@editPost');
// edit page
Route::get('admin/edit/page/{id}', 'PageController@editPage');

// delete post
Route::get('admin/delete/{id}', 'PostController@deletePost');
// delete page
Route::get('admin/delete/page/{id}', 'PageController@deletePage');

// lock post comments
Route::get('lock/{id}', 'PostController@lockPost');

// admin
Route::get('admin', 'AdminController@index');

// new post form
Route::get('admin/posts', array('before' => 'auth', 'do' => function()
{
	$user = Auth::user();
	$cats = DB::table('posts')->groupBy( 'category' )->get();
	$posts = DB::table('posts')->get();
	foreach ( $cats as $c )
	{
		$categories[] = array($c->category => $c->category);
	}
	
	if ( empty($categories) )
	{
		$categories[] = array('uncategorized' => 'uncategorized');
	}
	
	return View::make('newpost')->with('user', $user)->with('categories', $categories)->with('posts', $posts);
}));

// all posts
Route::get('admin/posts/all', array('before' => 'auth', 'do' => function()
{
	$user = Auth::user();
	$posts = DB::table('posts')->orderBy('id', 'desc')->paginate(5);
	return View::make('adminallposts')->with('user', $user)->with('posts', $posts);
}));

// all pages
Route::get('admin/pages/all', array('before' => 'auth', 'do' => function()
{
	$user = Auth::user();
	$pages = DB::table('pages')->orderBy('id', 'desc')->paginate(5);
	return View::make('adminallpages')->with('user', $user)->with('pages', $pages);
}));

// new page form
Route::get('admin/pages', array('before' => 'auth', 'do' => function()
{
	$user = Auth::user();
	return View::make('newpage')->with('user', $user);
}));

// new user form
Route::get('admin/register', array('before' => 'auth', 'do' => function()
{
	$user = Auth::user();
	$members = DB::table('users')->get();
	return View::make('adminregister')->with('user', $user)->with('members', $members);
}));

// edit user
Route::get('admin/user/edit/{id}', array('before' => 'auth', 'do' => function($id)
{
	$member = User::find($id);
	$user = Auth::user();
	return View::make('adminuseredit')->with('user', $user)->with('member', $member);
}));
// delete user
Route::get('admin/user/delete/{id}', 'UserController@processDelete');

// new menu item
Route::get('admin/menu', array('before' => 'auth', 'do' => function()
{
	$user = Auth::user();
	$menu = Menu::generateMenu();
	return View::make('adminmenu')->with('user', $user)->with('menu', $menu);
}));

// edit user
Route::get('admin/menu/edit/{id}', array('before' => 'auth', 'do' => function($id)
{
	$menu = Menu::find($id);
	$user = Auth::user();
	return View::make('adminmenuedit')->with('user', $user)->with('menu', $menu);
}));

// delete menu item
Route::get('admin/menu/delete/{id}', 'PageController@processMenuDelete');

// new conversion form
Route::get('admin/convert/wp', 'AdminController@showWpConvertForm');

// settings list
Route::get('admin/settings', 'AdminController@showSettingsList');

// lock session
Route::get('admin/session/lock', 'AdminController@lockSession');
Route::get('admin/locked', 'AdminController@lockScreen');

// log out
Route::get('logout', 'UserController@processLogout');

// share links
Route::get('s/{rand}', 'PostController@shareLink');

// password reset
Route::get('password/reset/{token}', function($token)
{
	$menu = Menu::generateMenu();
	View::share('menu', $menu);
	return View::make('resetpass')->with('token', $token);
});

// menu preview
Route::get('/preview_menu', function() {
	$menu = Menu::generateMenu();
	return View::make('previewmenu')->with('menu', $menu);
});

// menu
Route::get('/menu', function() {
	$menu = Menu::generateMenu();
	return View::make('menu')->with('menu', $menu);
});

/*
 * POST's
 */

// posting new post
Route::post('admin/posts', 'PostController@processPost');
Route::post('admin/edit/{id}', 'PostController@processEdit');
// logging in
Route::post('login', 'UserController@processLogin');
// creating a page
Route::post('admin/pages', 'PageController@processPage');
// editing a page
Route::post('admin/edit/page/{id}', 'PageController@processPageEdit');
// creating a user
Route::post('admin/register', 'UserController@processRegister');
// creating a menu item
Route::post('admin/menu', 'PageController@processMenu');
// editing a menu item
Route::post('admin/menu/edit/{id}', 'PageController@processMenuEdit');
// process conversion
Route::post('admin/convert/wp', 'AdminController@processWpConvert');
// edit user
Route::post('admin/user/edit/{id}', 'UserController@processEdit');
// password reminders
Route::post('password/remind', function()
{
	$credentials = array('email' => Input::get('email'));

	return Password::remind($credentials, function($message, $user)
	{
       	$message->subject('Your Password Reminder');
	});
});
Route::post('password/reset/{token}', array(
	'uses' => 'UserController@updatePassword',
	'as' => 'password.update'
));

// catch pages?
// NB... sort of a wildcard to allow URL's without something like /page/ in them.
// So we have it after all other routes.. so as not to affect other routes
// may have to use controller.
Route::get('{slug}', function($p) {
	$page = Page::findBySlug($p);
	$menu = Menu::generateMenu();
	View::share('menu', $menu);
	if ( $page )
	{
		return View::make('viewpage')->with('page', $page);
	}
	else
	{
		return View::make('errorpage')->with('page', $p);
	}
});

