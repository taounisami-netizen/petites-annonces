@props(['fighter'])

<article class="bg-white rounded-lg shadow hover:shadow-md transition p-5 flex flex-col gap-3">

    <div class="flex items-start justify-between gap-2">
        <h3 class="text-lg font-bold">
            <a href="{{ route('fighters.show', $fighter) }}" class="hover:text-red-600">
                {{ $fighter->title }}
            </a>
        </h3>

        @if ($fighter->isUndefeated())
            <span class="shrink-0 bg-yellow-400 text-gray-900 text-xs font-bold px-2 py-1 rounded">
                🏆 Invaincu
            </span>
        @endif
    </div>

    <p class="text-sm text-gray-500">
        📍 <a href="{{ route('cities.show', $fighter->city) }}" class="relative z-10 hover:text-red-600 hover:underline">{{ $fighter->city->name }}</a> · {{ $fighter->user->name }}
    </p>

    <p class="text-sm">
        <span class="text-green-600 font-semibold">{{ $fighter->wins }} V</span>
        –
        <span class="text-red-600 font-semibold">{{ $fighter->losses }} D</span>
    </p>

    <div class="mt-auto flex items-center justify-between">
        <a href="{{ route('styles.show', $fighter->style->value) }}"
           class="bg-gray-100 hover:bg-red-100 text-sm px-3 py-1 rounded-full">
            {{ $fighter->style->label() }}
        </a>
        <span class="text-xl font-bold text-red-600">
            {{ number_format((float) $fighter->price, 2, ',', ' ') }} €
        </span>
    </div>

</article>