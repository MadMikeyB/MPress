<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['body'];

    protected $dates = ['deleted_at'];

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
