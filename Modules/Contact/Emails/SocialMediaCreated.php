<?php

namespace Modules\Contact\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Emails\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use \Auth;

class SocialMediaCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        abort('500', 'Emails sender not configured. Contact Admin');
        /***
        return $this->from('example@example.com')
                    ->view('emails.test-email')
                    ->with([
                        'surname' => auth()->user()->surname,
                    ]);
         */
    }
}
