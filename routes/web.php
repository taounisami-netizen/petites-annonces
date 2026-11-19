<?php

use App\Http\Controllers\FighterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
Route::get('/', [FighterController::class, 'home'])->name('home');
Route::get('/fighters', [FighterController::class, 'index'])->name('fighters.index');
Route::middleware('auth')->group(function () {
    Route::get('/fighters/create', [FighterController::class, 'create'])->name('fighters.create');
    Route::post('/fighters', [FighterController::class, 'store'])->name('fighters.store');
    Route::get('/fighters/{fighter}/edit', [FighterController::class, 'edit'])->name('fighters.edit');
    Route::put('/fighters/{fighter}', [FighterController::class, 'update'])->name('fighters.update');
    Route::delete('/fighters/{fighter}', [FighterController::class, 'destroy'])->name('fighters.destroy');
    Route::get('/mes-combattants', [FighterController::class, 'mine'])->name('fighters.mine');
    Route::post('/fighters/{fighter}/messages', [MessageController::class, 'store'])->name('messages.store');
});
Route::get('/fighters/{fighter}', [FighterController::class, 'show'])->name('fighters.show');
Route::get('/styles/{style}', [FighterController::class, 'style'])->name('styles.show');
Route::get('/villes/{city}', [CityController::class, 'show'])->name('cities.show');

Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
require __DIR__.'/auth.php';
