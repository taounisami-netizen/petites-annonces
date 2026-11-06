<?php

namespace App\Http\Controllers;

use App\Enums\FightingStyle;
use App\Models\Fighter;
use Illuminate\View\View;

class FighterController extends Controller
{
    public function home(): View
    {
        return view('home', ['fighters' => Fighter::available()->with(['city', 'user'])->latest()->take(6)->get(), 'styles' => FightingStyle::cases()]);
    }

    public function index(): View
    {
        return view('fighters.index', ['fighters' => Fighter::available()->with(['city', 'user'])->latest()->get(), 'styles' => FightingStyle::cases()]);
    }

    public function show(Fighter $fighter): View
    {
        abort_if($fighter->unavailable_at !== null, 404);
        $fighter->load(['city', 'user']);

        return view('fighters.show', compact('fighter'));
    }

    public function style(FightingStyle $style): View
    {
        $fighters = Fighter::available()->where('style', $style)->with(['city', 'user'])->latest()->get();

        return view('fighters.style', compact('style', 'fighters'));
    }
}
