<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Modules\TravelOrder\Data\TravelOrderIdData;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;
use App\Models\TravelOrder;

class ShowTravelOrderUseCase
{
    public function execute(TravelOrderIdData $data): TravelOrder
    {
        $repository = app(TravelOrderRepository::class);
        return $repository->findById($data->id);
    }
}
