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
    	$posts = Post::paginate('15');
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
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
               'title'      => 'required|min:4|max:140',
               'content'    => 'required',
         ]);

        $post = new Post($request->all());
        $post->author_id = $request->user()->id;
        $post->save();

        session()->flash('flash_message', 'Yay! Something to read!');

        return redirect('/read/' . $post->slug );
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
