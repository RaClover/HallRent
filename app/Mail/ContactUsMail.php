<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.contact')
            ->subject('New Contact Message')
            ->with('contactData', $this->data);
    }

    public function toMail($notifiable)
    {
        $message = parent::toMail($notifiable);

        $message->withSwiftMessage(function ($swiftMessage) {
            $swiftMessage->getBody()
                ->setCharset('utf-8')
                ->setContentType('text/html');
        });

        return $message;
    }




}
