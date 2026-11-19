<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Fighter;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request, Fighter $fighter): RedirectResponse
    {
        // L'expéditeur vient de la session, pas du formulaire
        $fighter->messages()->create([
            'sender_id' => $request->user()->id,
            'body' => $request->validated('body'),
        ]);

        return back()->with('success', 'Votre message a été envoyé au combattant.');
    }
}
