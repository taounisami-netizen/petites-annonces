<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mon compte
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Bonjour {{ auth()->user()->name }}, vous êtes connecté.</p>

                    <div class="mt-4 flex flex-wrap gap-3">
                        <a href="{{ route('fighters.index') }}"
                           class="bg-gray-900 hover:bg-gray-700 text-white rounded px-4 py-2 font-semibold">
                            Voir les combattants
                        </a>
                        <a href="{{ route('fighters.mine') }}"
                           class="bg-gray-100 hover:bg-gray-200 rounded px-4 py-2 font-semibold">
                            Mes combattants
                        </a>
                        <a href="{{ route('fighters.create') }}"
                           class="bg-red-600 hover:bg-red-700 text-white rounded px-4 py-2 font-semibold">
                            Proposer mes services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
