<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Modules\TravelOrder\Data\TravelOrderUpdateStatusData;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;
use App\Models\TravelOrder;

class UpdateTravelOrderUseCase
{
    public function execute(TravelOrderUpdateStatusData $data): TravelOrder
    {
        //TODO: add validation: creation-user cant change status
        $repository = app(TravelOrderRepository::class);
        $travelOrder = $repository->findById($data->id);
        return $repository->update($travelOrder, $data);
    }
}
