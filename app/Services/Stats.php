<?php

namespace App\Services;

use App\Post;
use App\Page;
use App\Comment;
use App\User;
use App\Image;

class Stats {
	
	public function count( $type )
	{
		switch ( $type ) 
		{
			case 'post':
				return Post::count();
				break;
			case 'page':
				return Page::count();
				break;
			case 'comment':
				return Comment::count();
				break;
			case 'user':
				return User::count();
				break;
			default:
				return Post::count();
				break;
		}

	}

	public function countFrom($model)
	{
		return $model::count();
	}

}