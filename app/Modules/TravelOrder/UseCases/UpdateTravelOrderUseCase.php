<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Models\TravelOrder;
use App\Modules\TravelOrder\Data\TravelOrderIdData;
use App\Modules\TravelOrder\Enums\Status;
use App\Modules\TravelOrder\Exceptions\NewStatusMustBeCancalledOrApprovedException;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;

class UpdateTravelOrderUseCase
{
    public function execute(TravelOrderIdData $data): TravelOrder
    {
        if (!in_array($data->status, array_map(fn($status) => $status->value, Status::finishers())))
        {
            throw new NewStatusMustBeCancalledOrApprovedException;
        }

        $repository = app(TravelOrderRepository::class);

        $travelOrder = $repository->findById($data->id);

        return $repository->update($travelOrder, $data);
    }
}
