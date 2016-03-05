<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Post;
use Gate;

class CommentsController extends Controller
{

    public function validator(Request $request)
    {
        $this->validate($request, [
               'body'      => 'required|min:4|max:750',
         ]);
    }

    /**
     * Store the Comment
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validator($request);

        $comment = new Comment($request->all());
        $comment->author_id = $request->user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        session()->flash('flash_message', 'Thank you for reading!');

        return redirect('/read/' . $post->slug );
    }

    /**
     * Update the Comment
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function edit(Comment $comment)
    {
        if ( Gate::denies('edit-comment', $comment) ) {
            session()->flash('flash_message', 'You are not authorized to do that!');
            return redirect('/read/' . $comment->post->slug );
        }

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the Comment
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validator($request);

        if ( Gate::denies('update-comment', $comment) ) {
            session()->flash('flash_message', 'You are not authorized to do that!');
            return redirect('/read/' . $comment->post->slug );
        }

        $comment->update( $request->all() );

        return redirect('/read/'. $comment->post->slug . '#comment-' . $comment->id );
    }

    /**
     * Delete the Comment
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function destroy(Comment $comment)
    {
        if ( Gate::denies('delete-comment', $comment) ) {
            App::error('403');
        }
        
        $comment->delete();

        session()->flash('flash_message', 'Comment Deleted');

        return back();
    }
}
