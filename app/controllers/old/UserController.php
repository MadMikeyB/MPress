<?php

class UserController extends BaseController
{
	/*
	 * Show our login form.
	 */
	public function showLogin()
	{
		if ( Auth::check() === true ) 
		{
			return Redirect::to('admin');
		}
		
		return View::make('login');
	}
	
	/*
	 * Process our login attempt.
	 */
	public function processLogin()
	{
		$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
		);
		
		if ( Auth::attempt($userdata) )
		{
			return Redirect::to('admin');
		}
		else
		{
			return Redirect::to('login')->with('login_errors', true);
		}
	}
	
	/*
	 * Process our logout attempt.
	 */
	public function processLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}