<?php

class Menu extends Eloquent
{
	protected $fillable = array('title', 'url', 'position');
	public $timestamps = false;
	
	public static function generateMenu()
	{
		$menu	= DB::table('menus')->orderBy('position')->get();
		if ( $menu )
		{
			return $menu;
		}
	}
}
