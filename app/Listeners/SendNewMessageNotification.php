<?php

namespace App\Listeners;

use App\Events\MessageSent;
use App\Mail\NewMessageMail;
use Illuminate\Support\Facades\Mail;

class SendNewMessageNotification
{
    // Laravel trouve tout seul que ce listener écoute MessageSent grâce au type-hint
    public function handle(MessageSent $event): void
    {
        $fighter = $event->message->fighter;

        // Le mail part au membre qui a proposé le combattant
        Mail::to($fighter->user)->send(new NewMessageMail($event->message));
    }
}
