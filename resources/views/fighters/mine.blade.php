<x-public-layout title="Mes combattants">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Mes combattants</h1>
        <a href="{{ route('fighters.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded px-4 py-2">
            + Nouveau profil
        </a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($fighters as $fighter)
            <x-fighter-card :fighter="$fighter" />
        @empty
            <p class="text-gray-500">Vous n'avez pas encore proposé vos services.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $fighters->links() }}
    </div>

</x-public-layout>