<x-public-layout title="Combattants">

    <h1 class="text-3xl font-bold mb-6">Les combattants</h1>

    <h2 class="text-xl font-bold mb-3">Styles de combat</h2>
    <ul class="flex flex-wrap gap-2 mb-8">
        @foreach ($styles as $style)
            <li>
                <a href="{{ route('styles.show', $style->value) }}"
                   class="block bg-white border border-gray-300 hover:border-red-500 hover:text-red-600 px-3 py-1 rounded-full text-sm">
                    {{ $style->label() }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($fighters as $fighter)
            <x-fighter-card :fighter="$fighter" />
        @empty
            <p class="text-gray-500">Aucun combattant disponible.</p>
        @endforelse
    </div>

</x-public-layout>