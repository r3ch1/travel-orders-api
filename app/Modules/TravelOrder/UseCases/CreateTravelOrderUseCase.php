<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Modules\TravelOrder\Data\TravelOrderData;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;

class CreateTravelOrderUseCase
{
    public function execute(TravelOrderData $data)
    {
        return app(TravelOrderRepository::class)->create($data);
    }
}
