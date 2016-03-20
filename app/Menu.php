<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
	protected $fillable = ['title', 'url', 'position', 'group'];
	
	public static function generateMenu()
	{
		$menu	= DB::table('menus')->orderBy('position')->get();
		
		if ( $menu )
		{
			return $menu;
		}
	}
}
