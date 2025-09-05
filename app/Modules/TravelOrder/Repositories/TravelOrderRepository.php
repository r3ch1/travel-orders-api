<?php

namespace App\Modules\TravelOrder\Repositories;

use App\Support\Repositories\BaseRepository;
use App\Models\TravelOrder;
use App\Modules\TravelOrder\Data\TravelOrderData;
use App\Modules\TravelOrder\Data\TravelOrderUpdateStatusData;

class TravelOrderRepository extends BaseRepository
{
    public function model()
    {
        return TravelOrder::class;
    }

    public function findById($id): TravelOrder
    {
        return $this->makeModel()->findOrFail($id);
    }

    public function create(TravelOrderData $data): TravelOrder
    {
        return $this->makeModel()->create($data->toArray());
    }

    public function update(TravelOrder $travelOrder, TravelOrderUpdateStatusData $data): TravelOrder
    {
        $travelOrder->update($data->toArray());
        return $travelOrder->fresh();
    }
}

