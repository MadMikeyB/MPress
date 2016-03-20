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

class AdminController extends Controller
{
	public function __construct()
	{
		// Admin Theme for Admin Controller
		Theme::init('AdminLTE');
		//$this->middleware('admin');
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

}
