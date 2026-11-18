<x-public-layout :title="$fighter->title">

    <a href="{{ route('fighters.index') }}" class="text-sm text-red-600 hover:underline">
        ← Retour aux combattants
    </a>

    <div class="mt-4 grid gap-6 lg:grid-cols-3">

        <section class="lg:col-span-2 bg-white rounded-lg shadow p-6">
            <div class="flex flex-wrap items-center gap-3">
                <h1 class="text-3xl font-bold">{{ $fighter->title }}</h1>
                @if ($fighter->isUndefeated())
                    <span class="bg-yellow-400 text-gray-900 text-sm font-bold px-3 py-1 rounded">
                        🏆 Invaincu
                    </span>
                @endif
            </div>

            <p class="mt-2 text-gray-500">
                📍 <a href="{{ route('cities.show', $fighter->city) }}" class="hover:text-red-600 hover:underline">{{ $fighter->city->name }}</a> · Proposé par {{ $fighter->user->name }}
            </p>

            <a href="{{ route('styles.show', $fighter->style->value) }}"
               class="inline-block mt-4 bg-gray-100 hover:bg-red-100 px-3 py-1 rounded-full text-sm">
                {{ $fighter->style->label() }}
            </a>

            <div class="mt-6 grid grid-cols-3 gap-4 text-center">
                <div class="bg-green-50 rounded-lg p-4">
                    <p class="text-3xl font-bold text-green-600">{{ $fighter->wins }}</p>
                    <p class="text-sm text-gray-500">Victoires</p>
                </div>
                <div class="bg-red-50 rounded-lg p-4">
                    <p class="text-3xl font-bold text-red-600">{{ $fighter->losses }}</p>
                    <p class="text-sm text-gray-500">Défaites</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-3xl font-bold">{{ $fighter->winRate() }} %</p>
                    <p class="text-sm text-gray-500">De victoires</p>
                </div>
            </div>

            <h2 class="mt-8 text-xl font-bold">Présentation</h2>
            <p class="mt-2 text-gray-700 whitespace-pre-line">{{ $fighter->description }}</p>
        </section>

        <aside class="bg-white rounded-lg shadow p-6 h-fit">
            <p class="text-sm text-gray-500">Tarif du combat</p>
            <p class="text-4xl font-bold text-red-600">
                {{ number_format((float) $fighter->price, 2, ',', ' ') }} €
            </p>

            <dl class="mt-4 space-y-2 text-sm">
                <div class="flex justify-between">
                    <dt class="text-gray-500">Gains du combattant</dt>
                    <dd class="font-semibold">{{ number_format($fighter->fighterEarnings(), 2, ',', ' ') }} €</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Commission Uberbagarre</dt>
                    <dd class="font-semibold">{{ number_format($fighter->commission(), 2, ',', ' ') }} €</dd>
                </div>
            </dl>

            @auth
                <button disabled
                        class="mt-6 w-full bg-gray-300 text-gray-600 py-2 rounded font-semibold cursor-not-allowed">
                    Réservation bientôt disponible
                </button>
            @else
                <a href="{{ route('login') }}"
                   class="mt-6 block w-full text-center bg-red-600 hover:bg-red-700 text-white py-2 rounded font-semibold">
                    Connectez-vous pour commander
                </a>
            @endauth

            @can('update', $fighter)
                <div class="mt-6 pt-6 border-t flex gap-2">
                    <a href="{{ route('fighters.edit', $fighter) }}"
                       class="flex-1 text-center bg-gray-900 hover:bg-gray-700 text-white rounded px-4 py-2 font-semibold">
                        Modifier
                    </a>

                    <form method="POST" action="{{ route('fighters.destroy', $fighter) }}"
                          onsubmit="return confirm('Supprimer définitivement ce profil ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-white border border-red-600 text-red-600 hover:bg-red-50 rounded px-4 py-2 font-semibold">
                            Supprimer
                        </button>
                    </form>
                </div>
            @endcan
        </aside>

    </div>

</x-public-layout>