<x-public-layout :title="$fighter->title">
    <h1>{{ $fighter->title }}</h1>
    <p>{{ $fighter->description }}</p>
    <p>Prix : {{ number_format((float) $fighter->price, 2, ',', ' ') }} €</p>
    <p>Ville : {{ $fighter->city->name }}</p>
    <p>Publié par : {{ $fighter->user->name }}</p>
    <p>Style : <a href="{{ route('styles.show', $fighter->style->value) }}">{{ $fighter->style->label() }}</a></p>
    <p>Victoires : {{ $fighter->wins }} — Défaites : {{ $fighter->losses }}</p>
    <p><a href="{{ route('fighters.index') }}">Retour aux annonces</a></p>
</x-public-layout>
