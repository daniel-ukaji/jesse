<?php

namespace App\Providers;

// use App\Listeners\LogVerifiedUser;
// use Illuminate\Auth\Events\Verified;
use App\Events\MatchCreated;
use App\Events\UserCreated;
use App\Listeners\NewMatchNotifications;
use App\Listeners\NewUserNotifications;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        MatchCreated::class => [
            NewMatchNotifications::class,
        ],

        UserCreated::class => [
            NewUserNotifications::class
        ],

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Verified::class => [
        //     LogVerifiedUser::class,
        // ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
