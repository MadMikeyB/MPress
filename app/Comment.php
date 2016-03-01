<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	// Author
    public function user()
    {
    	return $this->belongsTo(User::class, 'author_id', 'id');
    }

    // Post
    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}
