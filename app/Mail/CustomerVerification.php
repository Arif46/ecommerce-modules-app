<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $contentDetail = [];
    protected $fromName = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contentDetail)
    {
        $this->contentDetail = $contentDetail;
        $this->fromName = env('EMAIL_TO_CUSTOMER_FROM_NAME');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('EMAIL_TO_CUSTOMER_FROM'), $this->fromName)
            ->subject($this->contentDetail['email_subject'])
            ->view('Web::email._registration')
            ->with('user_data',$this->contentDetail['email_body'])
            //->markdown('emails.pending_verification_summary')
            ;
    }
}
