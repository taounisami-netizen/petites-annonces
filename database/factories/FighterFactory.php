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
        $title = 'Combattant '.fake()->unique()->numberBetween(10000, 99999);

        return [
            'user_id' => User::factory(), 'city_id' => City::factory(),
            'title' => $title, 'slug' => Str::slug($title),
            'description' => fake()->paragraph(), 'price' => fake()->numberBetween(25, 300),
            'style' => fake()->randomElement(FightingStyle::cases()),
            'wins' => fake()->numberBetween(0, 30), 'losses' => fake()->numberBetween(0, 10),
            'unavailable_at' => null,
        ];
    }
}
