<x-public-layout title="Proposer mes services">

    <h1 class="text-3xl font-bold mb-6">Proposer mes services</h1>

    <form method="POST" action="{{ route('fighters.store') }}"
          class="bg-white rounded-lg shadow p-6 grid gap-5 max-w-2xl">
        @csrf

        <div>
            <label for="title" class="block font-semibold mb-1">Nom de scène</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                   class="w-full rounded @error('title') border-red-500 @else border-gray-300 @enderror">
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="city_id" class="block font-semibold mb-1">Ville</label>
                <select id="city_id" name="city_id"
                        class="w-full rounded @error('city_id') border-red-500 @else border-gray-300 @enderror">
                    <option value="">Choisir une ville</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @selected(old('city_id') == $city->id)>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
                @error('city_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="style" class="block font-semibold mb-1">Style de combat</label>
                <select id="style" name="style"
                        class="w-full rounded @error('style') border-red-500 @else border-gray-300 @enderror">
                    <option value="">Choisir un style</option>
                    @foreach ($styles as $style)
                        <option value="{{ $style->value }}" @selected(old('style') === $style->value)>
                            {{ $style->label() }}
                        </option>
                    @endforeach
                </select>
                @error('style')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid gap-5 sm:grid-cols-3">
            <div>
                <label for="price" class="block font-semibold mb-1">Tarif (€)</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01"
                       class="w-full rounded @error('price') border-red-500 @else border-gray-300 @enderror">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="wins" class="block font-semibold mb-1">Victoires</label>
                <input type="number" id="wins" name="wins" value="{{ old('wins', 0) }}"
                       class="w-full rounded @error('wins') border-red-500 @else border-gray-300 @enderror">
                @error('wins')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="losses" class="block font-semibold mb-1">Défaites</label>
                <input type="number" id="losses" name="losses" value="{{ old('losses', 0) }}"
                       class="w-full rounded @error('losses') border-red-500 @else border-gray-300 @enderror">
                @error('losses')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="description" class="block font-semibold mb-1">Présentation</label>
            <textarea id="description" name="description" rows="5"
                      class="w-full rounded @error('description') border-red-500 @else border-gray-300 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded px-4 py-2">
            Publier mon profil
        </button>
    </form>

</x-public-layout>