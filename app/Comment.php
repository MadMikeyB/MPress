<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GrahamCampbell\Markdown\Facades\Markdown;


class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['body'];

    protected $dates = ['deleted_at'];

    public function getBodyAttribute($body)
    {
        return Markdown::convertToHtml($body);
    }

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
