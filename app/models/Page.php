<?php

class Page extends Eloquent
{
	protected $fillable = array('title', 'slug', 'body', 'author_id');
	
	public function author()
	{
		return $this->belongs_to('User', 'author_id');
	}
	
	public static function findBySlug($slug)
	{
		$page	= DB::table('pages')->where('slug', $slug)->first();
		if ( $page )
		{
			return $page;
		}
	}
}
