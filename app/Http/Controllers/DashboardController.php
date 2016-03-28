<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->seo()->setTitle( 'Dashboard &mdash; ' . $this->seo()->getTitle() );
    	$posts = Post::where('author_id', '=', Auth::user()->id)->get();
        return view('home', compact('posts'));
    }
}
