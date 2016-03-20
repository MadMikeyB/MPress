<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Theme;

use App\Post;
use App\Page;
use App\Comment;
use App\User;
use App\Image;
use App\Menu;
use App\UserGroup;

class AdminController extends Controller
{
	public function __construct()
	{
		// Admin Theme for Admin Controller
		Theme::init('AdminLTE');
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

}
