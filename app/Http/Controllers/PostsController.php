<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GrahamCampbell\Markdown\Facades\Markdown;

use App\Post;

class PostsController extends Controller
{

    public function index()
    {
    	$posts = Post::all();
    	return view('posts.index', compact('posts'));
    }

    public function show($post) // @todo typecast Post $post using Slug rather than ID.
    {
    	$post = Post::findBySlug($post);
    	$post->content = Markdown::convertToHtml($post->content); 
    	return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Post $post)
    {

    }
}
