<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Setting;
use Theme;
use View;
use App\Menu;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	// Get the Theme from Settings, else set it to default
    	$theme = Setting::get('theme_name', 'alpha');
    	// Set the theme.
    	Theme::init($theme);
    	// Set the menu
    	$menu = Menu::generateMenu();
		View::share('menu', $menu);
    }
}
