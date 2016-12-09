<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class MenusController extends Controller 
{

	/**
     * Display Menu Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle( 'Menu Manager &mdash; ' . $this->seo()->getTitle() );

    	return view('admin.menu.index');
    }

    /**
     * Store the Menu Item
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request)
    {
        $menu = new Menu($request->all());
        $menu->save();

        session()->flash('flash_message', 'Menu Item Added!');

        return back();
    }
}