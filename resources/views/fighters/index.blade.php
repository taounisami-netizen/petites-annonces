<x-public-layout title="Combattants">

    <h1 class="text-3xl font-bold mb-6">Les combattants</h1>

    <form method="GET" action="{{ route('fighters.index') }}"
          class="bg-white rounded-lg shadow p-4 mb-6 grid gap-3 sm:grid-cols-4">

        <input type="search" name="q" value="{{ request('q') }}"
               placeholder="Nom du combattant…"
               class="rounded border-gray-300">

        <select name="city" class="rounded border-gray-300">
            <option value="">Toutes les villes</option>
            @foreach ($cities as $city)
                <option value="{{ $city->slug }}" @selected(request('city') === $city->slug)>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>

        <input type="number" name="max_price" value="{{ request('max_price') }}"
               placeholder="Tarif max (€)" min="0"
               class="rounded border-gray-300">

        <div class="flex gap-2">
            <button type="submit"
                    class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold rounded px-4 py-2">
                Filtrer
            </button>
            <a href="{{ route('fighters.index') }}"
               class="bg-gray-100 hover:bg-gray-200 rounded px-4 py-2">
                ✕
            </a>
        </div>
    </form>

    <ul class="flex flex-wrap gap-2 mb-6">
        @foreach ($styles as $style)
            <li>
                <a href="{{ route('styles.show', $style->value) }}"
                   class="block bg-white border border-gray-300 hover:border-red-500 hover:text-red-600 px-3 py-1 rounded-full text-sm">
                    {{ $style->label() }}
                </a>
            </li>
        @endforeach
    </ul>

    <p class="text-sm text-gray-500 mb-4">
        {{ $fighters->total() }} combattant(s) · page {{ $fighters->currentPage() }} sur {{ $fighters->lastPage() }}
    </p>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($fighters as $fighter)
            <x-fighter-card :fighter="$fighter" />
        @empty
            <p class="text-gray-500">Aucun combattant ne correspond à votre recherche.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $fighters->links() }}
    </div>

</x-public-layout>