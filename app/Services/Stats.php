<?php

namespace App\Services;

use App\Post;
use App\Page;
use App\Comment;
use App\User;
use App\Image;
use DB;

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
	// $stats->most( 'App\Comment', 'post_id' )->post->slug
	// $stats->most( 'App\Post', 'author_id' )->user->name
	public function most( $model, $groupBy )
	{
		$return = $model::selectRaw('*, COUNT(*) as count')->groupBy($groupBy)->orderBy('count', 'DESC')->first();

		return $return;
	}

	// @deprecated - above does the same as both of these
	// public function mostActiveAuthor()
	// {
	// 	$post = Post::selectRaw('*, COUNT(*) as count')->groupBy('author_id')->orderBy('count', 'DESC')->first();

	// 	return $post;
	// }

	// public function mostCommentedPost()
	// {
	// 	$comment = Comment::selectRaw('*, COUNT(*) as count')->groupBy('post_id')->orderBy('count', 'desc')->first();

	// 	return $comment;
	// }

}