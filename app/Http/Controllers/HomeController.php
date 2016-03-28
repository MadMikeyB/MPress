<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class HomeController extends Controller
{
	public function index()
    {
    	$post = Post::orderBy('id', 'DESC')->take('1')->first();
    	$posts = Post::where('id', '!=', $post->id)->orderBy('id', 'DESC')->take('6')->get();
        return view('welcome', compact(['post', 'posts']));
    }
}
