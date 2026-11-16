<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Uberbagarre' }} - Uberbagarre</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen flex flex-col bg-gray-100 text-gray-900">

    <header class="bg-gray-900 text-white">
        <nav class="max-w-6xl mx-auto px-4 py-4 flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-xl font-bold text-red-500">Uberbagarre</a>
            <a href="{{ route('fighters.index') }}" class="hover:text-red-400">Combattants</a>

            <div class="ml-auto flex gap-4">
                @auth
    <a href="{{ route('fighters.create') }}" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Proposer mes services</a>
    <a href="{{ route('dashboard') }}" class="hover:text-red-400">Mon compte</a>
@else
                    <a href="{{ route('login') }}" class="hover:text-red-400">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Inscription</a>
                @endauth
            </div>
        </nav>
    </header>

   <main class="flex-1 w-full max-w-6xl mx-auto px-4 py-8">
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{ $slot }}
</main>

    <footer class="bg-gray-900 text-gray-400 text-sm">
        <div class="max-w-6xl mx-auto px-4 py-6">
            Uberbagarre — Projet Laravel ESGI · Site parodique, aucun combat n'est réellement organisé.
        </div>
    </footer>

</body>
</html>