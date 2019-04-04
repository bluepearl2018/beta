<?php

namespace Modules\Contact\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Emails\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use \App\User;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $sender;
    public $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        User $recipient,
        User $sender,
        $subject, 
        $body)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->sender = $sender;
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Returns a copy of the message sent...
        // Has always subject and body
        // TODO check ->bcc to admin
        
        return $this->from('from@example.com')
        ->view('contact::emails.message_sent')
        ->with([
            'subject' => $this->subject,
            'body' => $this->body,
            'recipient' => $this->recipient,
            'sender' => $this->recipient
        ]);
        
    }
}
