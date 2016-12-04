<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events\PageWasViewed;

use App\Page;
use Markdown;
use Event;
use Gate;

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
        // Pages therefore need to be more complex than posts.

        $this->seo()->setTitle( $page->title . ' &mdash; ' . $this->seo()->getTitle() );


        Event::fire(new PageWasViewed($page));

        $page->content = Markdown::convertToHtml($page->content);
        return view('pages.show', compact('page'));
    }

    /**
     * Delete the Page
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function destroy(Page $page)
    {
        if ( Gate::denies('delete-page', $page) ) {
            session()->flash('flash_message', 'You are not authorized to do that!');
            return back();
        }
        
        $page->delete();

        session()->flash('flash_message', 'Page Deleted.');

        return redirect('/');
    }
}
