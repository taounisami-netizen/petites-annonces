<x-public-layout title="Accueil">

    <section class="bg-gray-900 text-white rounded-lg p-8 mb-10">
        <h1 class="text-3xl font-bold">
            Bienvenue sur <span class="text-red-500">Uberbagarre</span>
        </h1>
        <p class="mt-2 text-gray-300">
            Une bagarre de prévue ? Commandez un combattant qui se bat à votre place.
        </p>
        <a href="{{ route('fighters.index') }}"
           class="inline-block mt-6 bg-red-600 hover:bg-red-700 px-4 py-2 rounded font-semibold">
            Voir les combattants
        </a>
    </section>

    <h2 class="text-xl font-bold mb-3">Styles de combat</h2>
    <ul class="flex flex-wrap gap-2 mb-10">
        @foreach ($styles as $style)
            <li>
                <a href="{{ route('styles.show', $style->value) }}"
                   class="block bg-white border border-gray-300 hover:border-red-500 hover:text-red-600 px-3 py-1 rounded-full text-sm">
                    {{ $style->label() }}
                </a>
            </li>
        @endforeach
    </ul>

    <h2 class="text-xl font-bold mb-3">Derniers combattants</h2>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($fighters as $fighter)
            <x-fighter-card :fighter="$fighter" />
        @empty
            <p class="text-gray-500">Aucun combattant disponible.</p>
        @endforelse
    </div>

      <p class="mt-8 text-center">
        <a href="{{ route('fighters.index') }}" class="text-red-600 hover:underline font-semibold">
            Voir tous les combattants →
        </a>
    </p>

</x-public-layout>