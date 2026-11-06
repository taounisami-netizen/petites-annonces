<x-public-layout :title="$style->label()">
    <h1>{{ $style->label() }}</h1>
    @forelse ($fighters as $fighter)<x-fighter-card :fighter="$fighter" />@empty<p>Aucune annonce disponible dans ce style.</p>@endforelse
</x-public-layout>
