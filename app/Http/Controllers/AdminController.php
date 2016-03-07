<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Theme;

class AdminController extends Controller
{
	public function __construct()
	{
		Theme::init('AdminLTE');
		//$this->middleware('admin');
	}

    public function index() 
    {
    	return view('admin.index');
    }

}
