<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class HomeController extends Controller
{
	public function index()
    {
    	$post = Post::latest()->where('status', '!=', 'draft')->take('1')->first();
    	if ( $post )
    	{
    		$posts = Post::where('id', '!=', $post->id)->where('status', '!=', 'draft')->latest()->take('6')->get();
        	return view('welcome', compact(['post', 'posts']));
        }
        else
        {
        	return view('home');
        }
    }
}
