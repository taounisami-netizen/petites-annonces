<?php

namespace App\Http\Controllers;

use App\Enums\FightingStyle;
use App\Models\Fighter;
use Illuminate\View\View;
use App\Models\City;
use Illuminate\Http\Request;

class FighterController extends Controller
{
    public function home(): View
    {
        return view('home', ['fighters' => Fighter::available()->with(['city', 'user'])->latest()->take(6)->get(), 'styles' => FightingStyle::cases()]);
    }

  public function index(Request $request): View
{
    $fighters = Fighter::query()
        ->available()
        ->with(['city', 'user'])
        ->when($request->filled('q'), fn ($query) =>
            $query->where('title', 'like', '%'.$request->input('q').'%'))
        ->when($request->filled('city'), fn ($query) =>
            $query->whereRelation('city', 'slug', $request->input('city')))
        ->when($request->filled('max_price'), fn ($query) =>
            $query->where('price', '<=', $request->integer('max_price')))
        ->latest()
        ->paginate(12)
        ->withQueryString();

    return view('fighters.index', [
        'fighters' => $fighters,
        'cities'   => City::orderBy('name')->get(),
        'styles'   => FightingStyle::cases(),
    ]);
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
