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
		
		/**if ( $settings->altlogin == '1' )
		{
			return View::make('adminlogin');
		}
		else
		{
			return View::make('login');
		}**/
		
		return View::make('adminlogin');
	}
	
	/*
	 * Process our login attempt.
	 */
	public function processLogin()
	{
		$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
				'rememberme'=> Input::get('rememberme'),
		);		
		
		// log in
		$remember = false;
			
		if ( $userdata['rememberme'] == '1' )
		{
			$remember = true;
		}
		
		if ( Auth::attempt( array( 'username' => $userdata['username'], 'password' => $userdata['password'] ), $remember ) )
		{
			return Redirect::to('admin');
		}
		else
		{
			return Redirect::to('login')->with('login_errors', true);
		}
	}
	
	/*
	 * Show registration
	 */
	
	public function showRegister()
	{
		return View::make('adminregister');
	}
	
	/*
	 * Process our registration
	 */
	
	public function processRegister()
	{
		$userdata = array(
				'username'	=> Input::get('username'),
				'nickname'	=> Input::get('nickname'),
				'email'		=> Input::get('email'),
				'password'	=> Input::get('password'),
		);
	
		// add user
		$user 						= new User;
		$user->username				= $userdata['username'];
		$user->nickname				= $userdata['nickname'];
		$user->email				= $userdata['email'];
		$user->password				= Hash::make($userdata['password']);
		$user->save();
		
		return Redirect::to('admin/register')->with('success', 'User added :)');
		
	}
	
	/*
	 * Process our logout attempt.
	 */
	public function processLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	
	public function updatePassword()
	{
		$credentials = array('email' => Input::get('email'));
	
		return Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->save();
	
			return Redirect::to('login')->with('flash', 'Your password has been reset');
		});
	}
}