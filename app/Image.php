<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Image extends Model
{
	protected $fillable = ['image_path'];

	protected $baseDir = 'images/posts';

    public function user()
    {
    	return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function post()
    {
    	return $this->belongsTo(Post::class, 'id', 'post_id');
    }

    public static function fromForm(UploadedFile $file, Request $request)
    {
    	$image = new static;

    	$name = date('Y-m-d') .'-'. time() .'-'. $file->getClientOriginalName();

    	$image->image_path = $image->baseDir .'/'. $name;
    	$image->user_id = $request->user()->id;

    	$file->move($image->baseDir, $name);

    	return $image;
    }
}
