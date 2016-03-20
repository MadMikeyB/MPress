<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    public $fillable = ['key', 'value'];

    public static function get( $key, $default=false )
    {
    	$setting = static::where( 'key', $key )->first();

    	if ( ! $setting )
    	{
    		return $default;
    	}

    	return $setting->value;

    }

    public static function set( $key, $value )
    {
    	if ( $key != '_token' )
    	{
    		$setting = self::where('key', $key)->first();
    		if ( $setting->id )
    		{
    			self::find( $setting->id );
    			$setting->key = $key;
    			$setting->value = $value;
    			$setting->update();
    		}
    		else
    		{
    			$setting = new static;
    			$setting->key = $key;
    			$setting->value = $value;
    			$setting->save();
    		}
    	}
    }

}
