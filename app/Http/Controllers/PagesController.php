<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use Markdown;

class PagesController extends Controller
{
    /**
     * Show the Single Page
     *
     * @return Response
     */
    public function show(Page $page)
    {
        $page->content = Markdown::convertToHtml($page->content);
        return view('pages.show', compact('page'));
    }
}
