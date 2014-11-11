<?php

class Post extends Eloquent
{
	protected $fillable = array('title', 'title_seo', 'body', 'author_id', 'comments', 'share_id', 'created_at', 'updated_at', 'image', 'slider', 'featured', 'author', 'category');
	
	public function author()
	{
		return $this->belongs_to('User', 'author_id');
	}
	
	public static function findBySlug( $slug )
	{
		$post	= DB::table('posts')->where('title_seo', $slug)->first();
		if ( $post )
		{
			return $post;
		}
	}
	
	public static function findLatest()
	{
		$post	= DB::table('posts')->max('id');
		if ( $post )
		{
			return $post;
		}
	}

	public static function findFeatured( $limit = 5 )
	{
		$post	= DB::table('posts')->where('featured', '=', '1')->take( $limit )->get();
		if ( $post )
		{
			return $post;
		}
	}
	
	public static function findSlider( $limit = 5 )
	{
		$post	= DB::table('posts')->where('slider', '=', '1')->orderBy('id', 'desc')->take( $limit )->get();
		if ( $post )
		{
			return $post;
		}
	}
	
	public static function findPopular( $limit = 5 )
	{
		//$post	= DB::table('posts')->where('views', '>', '10')->where('created_at', '<=', date('Y-m-d'))->take( $limit )->get();
		$post	= DB::table('posts')->orderBy('views', 'desc')->take( $limit )->get();
		if ( $post )
		{
			return $post;
		}
	}

	public static function findCategories()
	{
		$categories = DB::table('posts')->where( 'category', '!=', '' )->groupBy('category')->get();
		if ( $categories )
		{
			return $categories;
		}
	}
	
	public static function updatePost( $data )
	{
		if ( $data )
		{
			// hacky stdClass Object conversion
			if ( is_array( $data ) )
			{
				$data = json_decode( json_encode( $data ), FALSE);
			}

			DB::table('posts')->where( 'id', $data->id )->update( 
																	array( 
																			'title'		=>	$data->title, 
																			'body'		=>	$data->body, 
																			'author_id'	=>	$data->author_id, 
																			'title_seo'	=>	$data->title_seo, 
																			'share_id'	=>	$data->share_id, 
																			'comments'	=>	$data->comments, 
																			'views'		=>	$data->views, 
																			'updated_at'=>	date('Y-m-d H:i:s'),
																			'image'		=>	$data->image,
																			'slider'	=>	$data->slider,
																			'featured'	=>	$data->featured,
																	) 
			);
		}
	}
	
}
