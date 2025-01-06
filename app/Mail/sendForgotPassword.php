<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    
    public function __construct()
    {
        
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify code with email',
        );
    }

   
    public function build(){
        return $this->view('code-verify');
    }


    public function attachments(): array
    {
        return [];
    }
}
