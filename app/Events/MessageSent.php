<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent
{
    use Dispatchable, SerializesModels;

    // L'événement transporte juste le message qui vient d'être envoyé
    public function __construct(public Message $message) {}
}
