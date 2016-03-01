<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GrahamCampbell\Markdown\Facades\Markdown;

use App\Post;

class PostsController extends Controller
{

    /**
     * Show the Single Post
     *
     * @return Response
     */
    public function index()
    {
    	$posts = Post::all();
    	return view('posts.index', compact('posts'));
    }

    /**
     * Show the Single Post
     *
     * @param \App\Post    $post
     * @return Response
     */
    public function show(Post $post)
    {
        $post->content = Markdown::convertToHtml($post->content); 
    	return view('posts.show', compact('post'));
    }

    /**
     * Store the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Update the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Delete the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function destroy(Post $post)
    {

    }
}
