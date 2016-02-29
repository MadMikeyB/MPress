<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

	// Author
    public function user()
    {
    	return $this->belongsTo(User::class, 'author_id', 'id');
    }

    // Category
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'content_id');
    }
}
