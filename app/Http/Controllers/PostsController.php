<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostsController extends Controller
{

    public function index()
    {
    	return view('posts.index', compact(Post::all()));
    }

    public function show(Post $post)
    {

    }

    public function store(Request $request, Post $post)
    {

    }

    public function update(Request $request, Post $post)
    {

    }

    public function destroy(Request $request, Post $post)
    {

    }
}
