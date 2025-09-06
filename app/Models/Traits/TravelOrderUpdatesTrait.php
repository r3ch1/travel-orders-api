<?php

namespace App\Models\Traits;

use App\Models\TravelOrder;
use App\Modules\TravelOrder\Enums\Status;
use App\Modules\TravelOrder\Notifications\TravelOrderFinalized;

trait TravelOrderUpdatesTrait
{
    public static function bootTravelOrderUpdatesTrait()
    {
        static::updated(function (TravelOrder $model) {
            if (!in_array($model->status, array_map(fn($status) => $status->value, Status::finishers())))
            {
                return;
            }
            $model->user->notify(new TravelOrderFinalized($model));
        });
    }
}
