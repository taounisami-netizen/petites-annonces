<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\View\View;

class CityController extends Controller
{
    // Route Model Binding : Laravel lit le slug dans l'URL (ex. « lyon »),
    // cherche la ville correspondante grâce au getRouteKeyName() du modèle City,
    // et la passe à la méthode. Si elle n'existe pas : 404 automatique.
    public function show(City $city): View
    {
        // Relation hasMany du modèle City : uniquement les combattants de cette ville
        $fighters = $city->fighters()
            // Scope : on écarte les combattants indisponibles
            ->available()
            // Eager loading, pour éviter le N+1 : la carte affiche la ville et le propriétaire
            ->with(['city', 'user'])
            // Les plus récents d'abord (exigence 4 du TP 3)
            ->latest()
            ->get();

        // compact('city', 'fighters') est un raccourci pour
        // ['city' => $city, 'fighters' => $fighters] : les variables envoyées à la vue
        return view('cities.show', compact('city', 'fighters'));
    }
}