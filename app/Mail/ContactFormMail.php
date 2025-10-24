<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New Contact Form Submission')
                    ->view('emails.contact-form')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'artwork' => $this->data['artwork'] ?? '—',
                        'userMessage' => $this->data['message'],
                        'ip' => $this->data['ip'],
                    ]);
    }
}
