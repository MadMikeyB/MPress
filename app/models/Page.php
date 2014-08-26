<?php

class Page extends Eloquent
{
	protected $fillable = array('title', 'slug', 'body', 'author_id');
	
	public function author()
	{
		return $this->belongs_to('User', 'author_id');
	}
	
	public static function findBySlug( $slug )
	{
		$page	= DB::table('pages')->where('slug', $slug)->first();
		if ( $page )
		{
			return $page;
		}
	}
	
	public static function updatePage( $data )
	{
		if ( $data )
		{
			// hacky stdClass Object conversion
			if ( is_array( $data ) )
			{
				$data = json_decode( json_encode( $data ), FALSE);
			}
		
			DB::table('pages')->where( 'id', $data->id )->update(
																array(
																	'title'		=>	$data->title,
																	'slug'		=>	$data->slug,
																	'body'		=>	$data->body,
																	'updated_at'=>	date('Y-m-d H:i:s'),
																)
															);
		}
	}
}
