<?php
class Setting extends Eloquent
{
	protected $fillable = array('title', 'setting');
	public $timestamps = false;
}