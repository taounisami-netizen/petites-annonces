<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Fighter;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $cities = collect(['Paris', 'Lyon', 'Marseille', 'Lille', 'Nantes', 'Bordeaux', 'Toulouse', 'Strasbourg'])
            ->map(fn ($name) => City::create(['name' => $name, 'slug' => Str::slug($name)]));
        $users = User::factory(9)->create();
        $users->push(User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']));
        Fighter::factory(100)->create([
            'user_id' => fn () => $users->random()->id,
            'city_id' => fn () => $cities->random()->id,
        ]);
    }
}
