<x-mail::message>
# Bonjour {{ $newMessage->fighter->user->name }},

**{{ $newMessage->sender->name }}** vous a écrit à propos de votre combattant « {{ $newMessage->fighter->title }} » :

<x-mail::panel>
{{ $newMessage->body }}
</x-mail::panel>

Répondez simplement à cet email pour lui écrire.

<x-mail::button :url="route('fighters.show', $newMessage->fighter)">
Voir le combattant
</x-mail::button>

À bientôt,<br>
{{ config('app.name') }}
</x-mail::message>
