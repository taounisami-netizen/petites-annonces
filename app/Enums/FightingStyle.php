<?php

namespace App\Enums;

enum FightingStyle: string
{
    case Boxing = 'boxing';
    case Mma = 'mma';
    case Judo = 'judo';
    case Wrestling = 'wrestling';
    case Street = 'street';

    public function label(): string
    {
        return match ($this) {
            self::Boxing    => 'Boxe anglaise',
            self::Mma       => 'MMA',
            self::Judo      => 'Judo',
            self::Wrestling => 'Catch',
            self::Street    => 'Bagarre de rue',
        };
    }
}