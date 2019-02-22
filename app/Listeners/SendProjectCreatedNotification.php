<?php

namespace App\Listeners;

use App\Mail\MailProjectCreated;
use App\Events\ProjectCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendProjectCreatedNotification {

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
     * @param  ProjectCreatedEvent $event
     * @return void
     */
    public function handle(ProjectCreatedEvent $event)
    {
        Mail::to($event->project->owner->email)->send(new MailProjectCreated($event->project));
    }
}
