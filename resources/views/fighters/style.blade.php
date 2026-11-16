<x-public-layout :title="$style->label()">

    <a href="{{ route('fighters.index') }}" class="text-sm text-red-600 hover:underline">
        ← Tous les combattants
    </a>

    <h1 class="mt-4 text-3xl font-bold">{{ $style->label() }}</h1>
    <p class="mt-1 mb-6 text-gray-500">
        {{ $fighters->count() }} combattant(s) disponible(s) dans ce style
    </p>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($fighters as $fighter)
            <x-fighter-card :fighter="$fighter" />
        @empty
            <p class="text-gray-500">Aucun combattant disponible dans ce style.</p>
        @endforelse
    </div>

</x-public-layout>