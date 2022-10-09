<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralMail extends Mailable
{
    use Queueable, SerializesModels;

    private $checkout;
    private $type;

    public function __construct($checkout, $type = '')
    {
        $this->checkout = $checkout;
        $this->type = $type;
    }

    public function build()
    {
        if($this->type == 'Update Status'){
            $subject = 'Update Status '.$this->checkout->Camp->title;
            $title = 'Update Status Camp';
            $body = 'Hi '.$this->checkout->User->name.', your transaction has been confirmed. Now you can enjoy the benefit of '.$this->checkout->Camp->title.' camp.';
            $buttontext = 'My Dashboard';
            $buttonurl = url('/user/dashboard');
        }else{
            $subject = "Register Camp: ".$this->checkout->Camp->title;
            $title = 'Registration Camp';
            $body = 'Hi '.$this->checkout->User->name.' yang sudah membeli kelas '.$this->checkout->Camp->title;
            $buttontext = 'Get Invoice';
            $buttonurl = url('/user/checkout/invoice', $checkout->id);
        }
        return $this->subject($subject)->markdown('emails.general', [
            'title'=>$title,
            'body'=>$body,
            'buttontext'=>$buttontext,
            'buttonurl'=>$buttonurl
        ]);
    }
}
