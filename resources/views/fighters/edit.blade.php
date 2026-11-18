<x-public-layout title="Modifier mon profil">

    <a href="{{ route('fighters.show', $fighter) }}" class="text-sm text-red-600 hover:underline">
        ← Retour à la fiche
    </a>

    <h1 class="mt-4 text-3xl font-bold mb-6">Modifier « {{ $fighter->title }} »</h1>

    <form method="POST" action="{{ route('fighters.update', $fighter) }}"
          class="bg-white rounded-lg shadow p-6 grid gap-5 max-w-2xl">
        @csrf
        @method('PUT')

        @include('fighters.form')

        <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded px-4 py-2">
            Enregistrer les modifications
        </button>
    </form>

</x-public-layout>