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
	
	public static function findSettingByKey( $key )
	{
		$setting	= DB::table('settings')->where('key', $key)->first();
		if ( $setting )
		{
			return $setting;
		}
	}
}