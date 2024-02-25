<?php

namespace App\Listeners;

use App\Events\posts_count;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class posts_count_listen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(posts_count $event)
    {
       $user =$event->post->user;
       $user->posts_count++;
       $user->save();
    }
}
