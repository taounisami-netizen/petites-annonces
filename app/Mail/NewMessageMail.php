<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewMessageMail extends Mailable
{
    // Pas « $message » : ce nom est déjà utilisé dans les vues de mail
    public function __construct(public Message $newMessage) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Nouveau message : {$this->newMessage->fighter->title}",
            // Le propriétaire peut répondre directement à l'acheteur
            replyTo: [$this->newMessage->sender->email],
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'mail.new-message');
    }
}
