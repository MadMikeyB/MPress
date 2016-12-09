<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Menu;
use App\Setting;

class Controller extends \App\Http\Controllers\Controller {

    use SEOToolsTrait;

	public function __construct()
	{
		// Admin Theme for Admin Controller
		Theme::init('AdminLTE');

        // Set the menu
        $menu = Menu::generateMenu();
        View::share('menu', $menu);

        $this->seo()->setTitle( 'Admin &mdash;' . Setting::get('site_title') );
        $this->seo()->setDescription(  Setting::get('site_description') );
        $this->seo()->opengraph()->setUrl( app()->make('url')->to('/') );
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite( Setting::get('social_twitter') );
	}
    
    public function validator(Request $request)
    {
        $this->validate($request, [
               'title'      => 'required|min:4|max:140',
               'content'    => 'required',
         ]);
    }

    public function index() 
    {
        $this->seo()->setTitle( 'Dashboard &mdash; ' . $this->seo()->getTitle() );

    	return view('admin.index');
    }
}