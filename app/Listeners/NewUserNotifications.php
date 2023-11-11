<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\Admin;
use App\Notifications\NewUser;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserNotifications implements ShouldQueue
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
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $adminUsers = Admin::all();
        foreach ($adminUsers as $admin) {
            $admin->notify(new NewUser($event->user));
        }
    }
}
