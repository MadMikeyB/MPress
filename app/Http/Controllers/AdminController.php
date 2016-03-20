<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Theme;
use View;
use Storage;

use App\Post;
use App\Page;
use App\Comment;
use App\User;
use App\Image;
use App\Menu;
use App\UserGroup;
use App\Setting;

class AdminController extends Controller
{
	public function __construct()
	{
		// Admin Theme for Admin Controller
		Theme::init('AdminLTE');

        // Set the menu
        $menu = Menu::generateMenu();
        View::share('menu', $menu);
	}

	// Dashboard
    public function index() 
    {
    	return view('admin.index');
    }

    public function menus()
    {
    	return view('admin.menu.index');
    }

    public function storeMenu(Request $request)
    {
        $menu = new Menu($request->all());
        $menu->save();

        session()->flash('flash_message', 'Menu Item Added!');

        return back();
    }

    public function posts()
    {
        $posts = Post::withTrashed()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function settings()
    {
        $settings = Setting::all();
        $themes = Storage::disk('resources')->directories('themes');
        return view('admin.settings.index', compact('settings', 'themes'));
    }

    public function storeSettings(Request $request)
    {
        foreach ($request->input() as $key => $value) {
            Setting::set($key, $value);
        }

        return back();
    }

}
