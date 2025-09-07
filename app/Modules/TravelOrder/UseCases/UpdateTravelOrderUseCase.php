<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Modules\TravelOrder\Data\TravelOrderIdData;
use App\Modules\TravelOrder\Enums\Status;
use App\Modules\TravelOrder\Exceptions\NewStatusNeedToBeCancalledOrApprovedException;
use App\Modules\TravelOrder\Exceptions\OnlyApprovedTravelOrderCanBeCancelledException;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;
use App\Models\TravelOrder;

class UpdateTravelOrderUseCase
{
    public function execute(TravelOrderIdData $data): TravelOrder
    {
        //TODO: add validation: creation-user cant change status
        if (!in_array($data->status, array_map(fn($status) => $status->value, Status::finishers())))
        {
            throw new NewStatusNeedToBeCancalledOrApprovedException;
        }

        $repository = app(TravelOrderRepository::class);

        $travelOrder = $repository->findById($data->id);

        if ($data->status === STATUS::CANCELLED->value && $travelOrder->status !== Status::APPROVED->value) {
            throw new OnlyApprovedTravelOrderCanBeCancelledException;
        }

        return $repository->update($travelOrder, $data);
    }
}
