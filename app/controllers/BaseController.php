<?php

class BaseController extends Controller {

	public function __construct()
	{	
		$menu = Menu::generateMenu();
		View::share('menu', $menu);
		
		$settings = Setting::findSettings();
		View::share('settings', $settings);
	}
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{		
			$this->layout = View::make($this->layout);
		}
	}

}