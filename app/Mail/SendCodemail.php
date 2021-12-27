<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCodeEmail extends Mailable
{
    use Queueable, SerializesModels;

        public $code;
    public $username;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$username)
    {
        $this->code=$code;
        $this->username=$username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('SUBJECT')
                    ->view('send-code-email');
    }
}