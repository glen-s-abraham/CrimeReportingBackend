<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $message;
    public function __construct($message)
    {
        $this->message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        error_log($this->message);
        return $this->view('email.complaintRecieved')
                    ->with([
                        'messageId'=>$this->message->id,
                        'messageTitle'=>$this->message->subject,
                    ]);
    }

    
}
