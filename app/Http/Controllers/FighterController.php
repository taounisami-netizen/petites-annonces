<?php

namespace App\Http\Controllers;

use App\Enums\FightingStyle;
use App\Http\Requests\StoreFighterRequest;
use App\Http\Requests\UpdateFighterRequest;
use App\Models\City;
use App\Models\Fighter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FighterController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'fighters' => Fighter::available()->with(['city', 'user'])->latest()->take(6)->get(),
            'styles'   => FightingStyle::cases(),
        ]);
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

    public function create(): View
    {
        return view('fighters.create', [
            'fighter' => new Fighter(),
            'cities'  => City::orderBy('name')->get(),
            'styles'  => FightingStyle::cases(),
        ]);
    }

    public function store(StoreFighterRequest $request): RedirectResponse
    {
        $fighter = $request->user()->fighters()->create([
            ...$request->validated(),
            'slug' => Str::slug($request->validated('title')).'-'.Str::lower(Str::random(6)),
        ]);

        return redirect()->route('fighters.show', $fighter)
            ->with('success', 'Votre profil de combattant est en ligne !');
    }

    public function mine(Request $request): View
    {
        $fighters = $request->user()->fighters()
            ->with(['city', 'user'])
            ->latest()
            ->paginate(12);

        return view('fighters.mine', compact('fighters'));
    }

    public function edit(Fighter $fighter): View
    {
        Gate::authorize('update', $fighter);

        return view('fighters.edit', [
            'fighter' => $fighter,
            'cities'  => City::orderBy('name')->get(),
            'styles'  => FightingStyle::cases(),
        ]);
    }

    public function update(UpdateFighterRequest $request, Fighter $fighter): RedirectResponse
    {
        $fighter->update($request->validated());

        return redirect()->route('fighters.show', $fighter)
            ->with('success', 'Votre profil a été mis à jour.');
    }

    public function destroy(Fighter $fighter): RedirectResponse
    {
        Gate::authorize('delete', $fighter);

        $fighter->delete();

        return redirect()->route('fighters.mine')
            ->with('success', 'Votre profil de combattant a été supprimé.');
    }

    public function show(Fighter $fighter): View
    {
        abort_if($fighter->unavailable_at !== null, 404);
        $fighter->load(['city', 'user']);

        return view('fighters.show', compact('fighter'));
    }

    public function style(FightingStyle $style): View
    {
        $fighters = Fighter::available()
            ->where('style', $style)
            ->with(['city', 'user'])
            ->latest()
            ->get();

        return view('fighters.style', compact('style', 'fighters'));
    }
}