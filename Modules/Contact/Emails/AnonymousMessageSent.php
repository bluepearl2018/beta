<?php

namespace Modules\Contact\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Emails\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use \App\User;

class AnonymousMessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;
    public $surname;
    public $phone;
    public $email;
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
        $firstname,
        $surname,
        $phone, 
        $email,
        $subject,
        $body,
        $sender,
        $ip, 
        $recipient
        )
    {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->subject = $subject;
        $this->body = $body;
        $this->sender = $sender;
        $this->ip = $ip;
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
        return $this->from('contact-request@eutranet.com')
        ->subject($this->subject)
        ->view('contact::emails.anonymous_message_sent')
        ->with([
            'firstname' => $this->firstname,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'email' => $this->email,
            'subject' => $this->subject,
            'body' => $this->body,
            'sender' => $this->sender,
            'ip' => $this->ip,
            'recipient' => $this->recipient
        ]);
        
    }
}
