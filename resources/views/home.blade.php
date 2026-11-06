<x-public-layout title="Accueil">
    <h1>Bienvenue sur Uberbagarre</h1>
    <p>Découvrez les dernières annonces de combattants.</p>
    <h2>Styles de combat</h2>
    <ul>@foreach ($styles as $style)<li><a href="{{ route('styles.show', $style->value) }}">{{ $style->label() }}</a></li>@endforeach</ul>
    <h2>Dernières annonces</h2>
    @forelse ($fighters as $fighter)<x-fighter-card :fighter="$fighter" />@empty<p>Aucune annonce disponible.</p>@endforelse
    <p><a href="{{ route('fighters.index') }}">Toutes les annonces</a></p>
</x-public-layout>
