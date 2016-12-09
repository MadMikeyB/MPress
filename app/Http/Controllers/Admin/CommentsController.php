<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Comment;

class CommentsController extends Controller 
{
	/**
     * Display Comment Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle( 'Comment Manager &mdash; ' . $this->seo()->getTitle() );
        $comments = Comment::withTrashed()->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }
}