<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MeetingMinutes extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lts.iubat@gmail.com', 'Lead Tracking System')
        ->subject("Meeting Minutes")
        ->view('mail.meetingminutes')
        ->with([
            'name' => $this->request->client->name,
        ])
        ->attachFromStorage($this->request->path);
    }
}
