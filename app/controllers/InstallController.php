<?php

class InstallController extends Controller 
{
	/**
	 * @brief - Auth Check
	 * @return NULL
	 */
	public function getIndex()
	{	
		return View::make('install/index');
	}
	
	/**
	 * @brief - Database / Site Details
	 * @return NULL
	 */
	
	public function getDatabase()
	{
		return View::make('install/details');
	}
	
	public function postDatabase()
	{
		$data = Input::all();
		
		$config = @file_get_contents( app_path() . '/config/database.php' );
		if ( !$config )
		{
			$config = file_get_contents( app_path() . '/config/database.php.default' );
		}
		
		$config = str_replace("localhost", $data['dbhost'], $config);
		$config = str_replace("CHANGE_ME_DB", $data['dbname'], $config);
		$config = str_replace("CHANGE_ME_U", $data['dbusername'], $config);
		$config = str_replace("CHANGE_ME_P", $data['dbpassword'], $config);	
		if ( file_put_contents( app_path() . '/config/database.php', $config ) )
		{
			DB::unprepared( file_get_contents( app_path() . '/database/mpress.sql' ) );
			return Redirect::to('install/admin');
		}
	}

	/**
	 * @brief - Admin User Set Up
	 * @return NULL
	 */
	
	public function getAdmin()
	{
		return View::make('install/admin');
	}
	
	public function postAdmin()
	{
		$data = Input::all();
		
		$user 						= new User;
		$user->username				= $data['adminuser'];
		$user->nickname				= $data['adminuser'];
		$user->email				= $data['adminemail'];
		$user->password				= Hash::make($data['adminpassword']);
		$user->save();
		
		return Redirect::to('install/finalize');
	}
	
	/**
	 * @brief - Finalize (Lock installer, chmods etc)
	 * @return NULL
	 */
	
	public function getFinalize()
	{
		file_put_contents( storage_path() . '/installer_lock.txt', 'Hello! MPress is now installed. You can ignore this file, but please don\'t remove it. :)' );
		return View::make('install/finalize');
	}
	
	
}