<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailProjectCreated extends Mailable {

    use Queueable, SerializesModels;

    public $project;
    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param $project
     */
    public function __construct($project)
    {
        $this->project = $project;
        $this->subject = ("Project" . " " . "\"$project->title\"" . " " . "created");
        $this->message = ("Project" . " " . "\"$project->title\"" . " " . "started, on" . " " . $project->created_at);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->subject;
        $message = $this->message;

        return $this->subject($subject)
                    ->markdown('mail.project-created')
                    ->with($message);
    }
}
