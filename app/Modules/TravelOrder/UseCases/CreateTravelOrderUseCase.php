<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Models\TravelOrder;
use App\Modules\TravelOrder\Data\TravelOrderData;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;

class CreateTravelOrderUseCase
{
    public function execute(TravelOrderData $data): TravelOrder
    {
        return app(TravelOrderRepository::class)->create($data);
    }
}
