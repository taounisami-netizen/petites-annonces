<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        // Une ville ajoutée, modifiée ou supprimée : la navigation en cache n'est plus à jour
        static::saved(fn () => Cache::forget('cities'));
        static::deleted(fn () => Cache::forget('cities'));
    }

    public function fighters(): HasMany
    {
        return $this->hasMany(Fighter::class);
    }
}
