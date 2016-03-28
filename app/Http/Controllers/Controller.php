<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Setting;
use Theme;
use View;
use App\Menu;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SEOToolsTrait;

    public function __construct()
    {
    	// Get the Theme from Settings, else set it to default
    	$theme = Setting::get('theme_name', 'alpha');
    	// Set the theme.
    	Theme::init($theme);
    	// Set the menu
    	$menu = Menu::generateMenu();
		View::share('menu', $menu);

        $this->seo()->setTitle( Setting::get('site_title') );
        $this->seo()->setDescription(  Setting::get('site_description') );
        $this->seo()->opengraph()->setUrl( app()->make('url')->to('/') );
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite( Setting::get('social_twitter') );

    }
}
