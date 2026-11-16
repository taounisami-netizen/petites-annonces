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
            'user_id'        => User::factory(),
            'city_id'        => City::factory(),
            'title'          => $title,
            'slug'           => Str::slug($title).'-'.Str::lower(Str::random(6)),
            'description'    => fake('fr_FR')->realText(300),
            'style'          => $style,
            'price'          => $style === FightingStyle::Wrestling
                ? fake()->numberBetween(15, 60)
                : fake()->numberBetween(80, 300),
            'wins'           => $style === FightingStyle::Wrestling
                ? fake()->numberBetween(0, 8)
                : fake()->numberBetween(10, 35),
            'losses'         => $style === FightingStyle::Wrestling
                ? fake()->numberBetween(8, 20)
                : fake()->numberBetween(0, 8),
            'unavailable_at' => null,
        ];
    }
}