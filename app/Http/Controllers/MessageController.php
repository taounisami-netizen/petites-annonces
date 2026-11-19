<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Fighter;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request, Fighter $fighter): RedirectResponse
    {
        // L'expéditeur vient de la session, pas du formulaire
        $message = $fighter->messages()->create([
            'sender_id' => $request->user()->id,
            'body' => $request->validated('body'),
        ]);

        // On annonce juste ce qui s'est passé, c'est le listener qui envoie le mail
        MessageSent::dispatch($message);

        return back()->with('success', 'Votre message a été envoyé au combattant.');
    }
}
