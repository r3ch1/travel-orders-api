<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Modules\TravelOrder\Data\TravelOrderData;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;
use App\Models\TravelOrder;

class CreateTravelOrderUseCase
{
    public function execute(TravelOrderData $data): TravelOrder
    {
        return app(TravelOrderRepository::class)->create($data);
    }
}
