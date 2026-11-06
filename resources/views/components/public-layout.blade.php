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
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">Uberbagarre</a> |
            <a href="{{ route('fighters.index') }}">Annonces</a> |
            @auth
                <a href="{{ route('dashboard') }}">Mon compte</a>
            @else
                <a href="{{ route('login') }}">Connexion</a> |
                <a href="{{ route('register') }}">Inscription</a>
            @endauth
        </nav>
    </header>
    <main>{{ $slot }}</main>
    <footer><p>Uberbagarre — Projet Laravel</p></footer>
</body>
</html>
