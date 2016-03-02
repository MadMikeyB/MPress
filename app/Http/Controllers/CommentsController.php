<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    /**
     * Store the Comment
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
               'body'      => 'required|min:4|max:750',
         ]);
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
    public function update(Request $request)
    {

    }

    /**
     * Delete the Comment
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function destroy(Comment $post)
    {

    }
}
