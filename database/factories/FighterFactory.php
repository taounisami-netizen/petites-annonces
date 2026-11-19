<?php

namespace Database\Factories;

use App\Enums\FightingStyle;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FighterFactory extends Factory
{
    public function definition(): array
    {
        $style = fake()->randomElement(FightingStyle::cases());

        $nickname = fake()->randomElement([
            'le Marteau', 'la Brique', 'le Bulldozer', "Poings d'Acier",
            'le Mur', 'la Tornade', 'le Silencieux', "l'Enclume",
            'le Boucher', 'la Machine', 'le Taureau', 'Mâchoire de Fer',
        ]);

        $title = fake('fr_FR')->firstName().' '.$nickname;

        return [
            'user_id' => User::factory(),
            'city_id' => City::factory(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.Str::lower(Str::random(6)),
            'description' => implode(' ', [
                fake()->randomElement([
                    'Une embrouille de prévue ? Je m\'en occupe à votre place.',
                    'Ancien videur de boîte de nuit, je ne recule devant personne.',
                    'Toujours à l\'heure, jamais blessé, rarement poli.',
                    'Vous restez au chaud, je règle le conflit pour vous.',
                    'Dix ans de bagarres de parking, zéro regret.',
                ]),
                'Spécialité : '.$style->label().'.',
                $style === FightingStyle::Wrestling
                    ? 'Très spectaculaire sur un ring, nettement moins dans la rue.'
                    : fake()->randomElement([
                        'Je ne frappe jamais en premier… sauf supplément.',
                        'Discrétion assurée, aucune question posée.',
                        'Déplacement possible dans toute la ville.',
                        'Paiement d\'avance, aucun remboursement en cas de défaite.',
                    ]),
            ]),
            'style' => $style,
            'price' => $style === FightingStyle::Wrestling
                ? fake()->numberBetween(15, 60)
                : fake()->numberBetween(80, 300),
            'wins' => $style === FightingStyle::Wrestling
                ? fake()->numberBetween(0, 8)
                : fake()->numberBetween(10, 35),
            'losses' => $style === FightingStyle::Wrestling
                ? fake()->numberBetween(8, 20)
                : fake()->numberBetween(0, 8),
            'unavailable_at' => null,
        ];
    }
}
