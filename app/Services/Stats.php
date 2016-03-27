<?php

namespace App\Services;

use App\Post;
use App\Page;
use App\Comment;
use App\User;
use App\Image;
use DB;

class Stats {
	
	public function countFrom($model)
	{
		return $model::count();
	}

	public function most( $model, $groupBy )
	{
		$return = $model::selectRaw('*, COUNT(*) as count')->groupBy($groupBy)->orderBy('count', 'DESC')->withTrashed()->first();

		if ( $return )
		{
			return $return;
		}
		else
		{
			return '0';
		}
	}

}