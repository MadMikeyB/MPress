<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Post extends Model implements SluggableInterface
{

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
    
	// Author
    public function user()
    {
    	return $this->belongsTo('User', 'id', 'author_id');
    }

    // Category
    public function category()
    {
    	return $this->belongsTo('Category', 'content_id', 'category_id')
    }
}
