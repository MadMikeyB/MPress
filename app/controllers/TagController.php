<?php

class TagController extends BaseController
{
	public function search( $tag )
	{
		$tags = Tag::where('title', 'LIKE', $tag)->paginate(10);
		
		return View::make('tags')->with( 'tags', $tags )->with( 'tag', $tag );
	}	
}