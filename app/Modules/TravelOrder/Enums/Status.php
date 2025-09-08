<?php

namespace App\Modules\TravelOrder\Enums;

enum Status: string
{
    case REQUESTED = 'requested';
    case APPROVED = 'approved';
    case CANCELLED = 'cancelled';

    public static function finishers(): array
    {
        return array_filter(self::cases(), fn ($case) => $case->value !== self::REQUESTED->value);
    }
}
