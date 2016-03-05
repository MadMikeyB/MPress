<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements SluggableInterface
{
    use SoftDeletes;
    use SluggableTrait;

    protected $fillable = ['title', 'content'];
    protected $dates = ['deleted_at'];


    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

	// Author
    public function user()
    {
    	return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
