<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $fromEmail;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fromEmail, $msg)
    {
        $this->fromEmail = $fromEmail;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-received');
    }
}
