<?php

namespace App\Listeners;

use App\Events\PageWasViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PageWasViewedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PageWasViewed  $event
     * @return void
     */
    public function handle(PageWasViewed $event)
    {
        $event->page->increment('views');
        $event->page->views += 1;
    }
}
