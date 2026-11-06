<?php

namespace App\Models;

use App\Enums\FightingStyle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fighter extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id', 'title', 'slug', 'description',
        'price', 'style', 'wins', 'losses', 'unavailable_at',
    ];

    protected function casts(): array
    {
        return [
            'price'          => 'decimal:2',
            'style'          => FightingStyle::class,
            'unavailable_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }


    public function scopeAvailable(Builder $query): void
    {
        $query->whereNull('unavailable_at');
    }

  

    public function isUndefeated(): bool
    {
        return $this->losses === 0;
    }

    public function commission(): float
    {
        return $this->price * config('uberbagarre.commission_rate');
    }

    public function fighterEarnings(): float
    {
        return $this->price - $this->commission();
    }
}