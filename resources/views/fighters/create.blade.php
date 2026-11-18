<x-public-layout title="Proposer mes services">

    <h1 class="text-3xl font-bold mb-6">Proposer mes services</h1>

    <form method="POST" action="{{ route('fighters.store') }}"
          class="bg-white rounded-lg shadow p-6 grid gap-5 max-w-2xl">
        @csrf

        @include('fighters.form')

        <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded px-4 py-2">
            Publier mon profil
        </button>
    </form>

</x-public-layout>