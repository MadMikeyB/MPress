<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\User;

class UsersController extends Controller 
{
    /**
     * Display User Listing
     *
     * @return \Illuminate\View\View
     */ 
    public function index()
    {
        $this->seo()->setTitle( 'User Manager &mdash; ' . $this->seo()->getTitle() );
        $users = User::withTrashed()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}