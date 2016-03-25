<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use GrahamCampbell\Markdown\Facades\Markdown;

use App\Post;
use App\Events\PostWasViewed;
use App\Image;
use Event;
use Gate;


class PostsController extends Controller
{
    public function validator(Request $request)
    {
        $this->validate($request, [
               'title'      => 'required|min:4|max:140',
               'content'    => 'required',
               // 'image'      => 'mimes:jpg,jpeg,png,bmp'
         ]);
    }

    /**
     * Show the Single Post
     *
     * @return Response
     */
    public function index()
    {
    	$posts = Post::where('status', 'publish')->paginate('6');
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

        Event::fire(new PostWasViewed($post));

    	return view('posts.show', compact('post'));
    }

    /**
     * Create the Post
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

        session()->flash('flash_message', 'Yay! Something to read!');

        return redirect('/read/' . $post->slug );
    }

    public function storeImage(Post $post, Request $request)
    {
        $image = Image::fromForm( $request->file('file'), $request );
        $post->addImage($image);
    }

    /**
     * Show the Edit View
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */   
    public function edit(Post $post)
    {
        if ( Gate::denies('edit-post', $post) ) {
            session()->flash('flash_message', 'You are not authorized to do that!');
            return redirect('/read/' . $post->slug );
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function update(Request $request, Post $post)
    {

        $this->validator($request);

        if ( Gate::denies('update-post', $post) ) {
            session()->flash('flash_message', 'You are not authorized to do that!');
            return redirect('/read/' . $post->slug );
        }

        $post->update($request->all());
        session()->flash('flash_message', 'Did you just fix a typo?');

        return redirect('/read/' . $post->slug );

    }

    /**
     * Delete the Post
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function destroy(Post $post)
    {
        if ( Gate::denies('delete-post', $post) ) {
            session()->flash('flash_message', 'You are not authorized to do that!');
            return back();
        }
        
        $post->status = 'deleted';
        $post->save();
        
        $post->delete();

        session()->flash('flash_message', 'Post Deleted.');

        return redirect('/posts');
    }
}
