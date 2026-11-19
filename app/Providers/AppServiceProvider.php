<?php

namespace App\Providers;

use App\Models\City;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View Composer : les villes de la navigation sont disponibles dans le layout
        // sur toutes les pages, sans les passer depuis chaque contrôleur
        View::composer('components.public-layout', function ($view) {
            $view->with('navCities', City::orderBy('name')->get());
        });
    }
}
