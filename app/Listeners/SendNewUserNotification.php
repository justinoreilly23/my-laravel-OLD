<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Mail\MailNewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNewUserNotification {

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
     * @param NewUserEvent $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        Mail::to($event->email)->send(new MailNewUser($event->project));
    }
}
