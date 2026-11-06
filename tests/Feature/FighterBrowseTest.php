<?php

use App\Enums\FightingStyle;
use App\Models\City;
use App\Models\Fighter;
use App\Models\User;

test('the demo seeder creates the requested data', function () {
    $this->seed();
    expect(City::count())->toBe(8)->and(User::count())->toBe(10)->and(Fighter::count())->toBe(100);
});

test('visitors can browse available fighters and styles', function () {
    $fighter = Fighter::factory()->create(['title' => 'Combattant disponible', 'style' => FightingStyle::Boxing]);
    $hidden = Fighter::factory()->create(['title' => 'Combattant indisponible', 'unavailable_at' => now()]);
    $this->get(route('home'))->assertOk()->assertSee($fighter->title)->assertDontSee($hidden->title);
    $this->get(route('fighters.index'))->assertOk()->assertSee($fighter->title)->assertDontSee($hidden->title);
    $this->get(route('fighters.show', $fighter))->assertOk()->assertSee($fighter->title);
    $this->get(route('styles.show', 'boxing'))->assertOk()->assertSee($fighter->title);
    $this->get(route('fighters.show', $hidden))->assertNotFound();
    $this->get('/fighters/inexistant')->assertNotFound();
    $this->get('/styles/inexistant')->assertNotFound();
});
