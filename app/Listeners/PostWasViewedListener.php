<?php

namespace App\Listeners;

use App\Events\PostWasViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostWasViewedListener implements ShouldQueue
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
     * @param  PostWasViewed  $event
     * @return void
     */
    public function handle(PostWasViewed $event)
    {
        $event->post->increment('views');
        $event->post->views += 1;
    }
}
