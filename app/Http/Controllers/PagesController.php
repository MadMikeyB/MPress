<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events\PageWasViewed;

use App\Page;
use Markdown;
use Event;

class PagesController extends Controller
{

    /**
     * Show the Single Page
     *
     * @return Response
     */
    public function show(Page $page)
    {
        // Pages need to be completely controllable
        // Users need to be able to enter HTML, Markdown and Blade Syntax
        // It then needs to be outputted into a template with the header and footer wrapper..
        // Option to not show the header / footer wrapper
        // We can then set a Page to be the Home Page from the settings page
        // Pages therefore need to be more complex than pages.

        Event::fire(new PageWasViewed($page));

        $page->content = Markdown::convertToHtml($page->content);
        return view('pages.show', compact('page'));
    }
}
