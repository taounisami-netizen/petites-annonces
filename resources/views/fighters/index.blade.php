<x-public-layout title="Annonces">
    <h1>Les combattants</h1>
    <h2>Styles</h2>
    <ul>@foreach ($styles as $style)<li><a href="{{ route('styles.show', $style->value) }}">{{ $style->label() }}</a></li>@endforeach</ul>
    @forelse ($fighters as $fighter)<x-fighter-card :fighter="$fighter" />@empty<p>Aucune annonce disponible.</p>@endforelse
</x-public-layout>
