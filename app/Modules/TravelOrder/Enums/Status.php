<?php

namespace App\Modules\TravelOrder\Enums;

enum Status: string
{
    case Requested = 'requested';
    case Approved = 'approved';
    case Cancelled = 'cancelled';
}
