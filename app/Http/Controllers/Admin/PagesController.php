<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Page;

class PagesController extends Controller 
{
    /**
     * Display Page Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle( 'Page Manager &mdash; ' . $this->seo()->getTitle() );
        $pages = Page::withTrashed()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }


    /**
     * Create the Page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->seo()->setTitle( 'New Page &mdash; ' . $this->seo()->getTitle() );

        return view('admin.pages.create');
    }

    /**
     * Store the Page
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request)
    {        
        $this->validator($request);

        $page = new Page($request->all());
        $page->author_id = $request->user()->id;

        $page->save();

        session()->flash('flash_message', 'Congrats! Page created.');

        return redirect('/' . $page->slug );
    }

}