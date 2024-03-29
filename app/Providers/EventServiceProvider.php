<?php

namespace App\Providers;

use App\Events\NewUserEvent;
use App\Events\ProjectCreatedEvent;
use App\Listeners\SendNewUserNotification;
use App\Listeners\SendProjectCreatedNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ProjectCreatedEvent::class => [
            SendProjectCreatedNotification::class,
        ],

        NewUserEvent::class => [
            SendNewUserNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
