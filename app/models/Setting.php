<?php
class Setting extends Eloquent
{
	protected $fillable = array('title', 'setting');
	public $timestamps = false;
	
	public static function findSettings()
	{
		$settings = DB::table('settings')->get();
		return $settings;
	}
	
	public static function findByKey( $key )
	{
		$setting	= DB::table('settings')->where('key', $key)->first();
		if ( $setting )
		{
			/*if ( $setting->type == 'text' )
			{
				return $setting->value;
			}
			else
			{
				return $setting;
			}*/
			return $setting->value;
		}
	}
}