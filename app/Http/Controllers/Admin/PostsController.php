<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Post;

class PostsController extends Controller 
{
	/**
     * Display Post Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle( 'Post Manager &mdash; ' . $this->seo()->getTitle() );
        $posts = Post::withTrashed()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

	/**
     * Create the Post
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->seo()->setTitle( 'New Post &mdash; ' . $this->seo()->getTitle() );

        return view('admin.posts.create');
    }

    /**
     * Store the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request)
    {        
        $this->validator($request);

        $post = new Post($request->all());
        $post->author_id = $request->user()->id;
        
        if ( $request->has('draft') )
        {
            $post->status = 'draft';
        }
        else
        {
            $post->status = 'publish';
        }

        if ( $request->has('category') )
        {
            $post->category_id = $request->category;
        }
        else
        {
            $post->category_id = '1';
        }

        $post->save();

        session()->flash('flash_message', 'Congrats! Post Created');

        return redirect('/read/' . $post->slug );
    }


}
