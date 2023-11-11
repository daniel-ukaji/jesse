<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\MatchCreated;
use App\Notifications\NewMatch;
use App\Notifications\NewMatchee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewMatchNotifications implements ShouldQueue
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
     * @param  \App\Events\MatchCreated  $event
     * @return void
     */
    public function handle(MatchCreated $event)
    {
        $user_1 = User::find($event->matches->user_id);
        $user_2 = User::find($event->matches->matchedUser_id);

        $user_1->notify(new NewMatch($event->matches));
        $user_2->notify(new NewMatchee($event->matches));
    }
}
