<?php

namespace App\Modules\TravelOrder\Repositories;

use App\Support\Repositories\BaseRepository;
use App\Models\TravelOrder;
use App\Modules\TravelOrder\Data\TravelOrderData;

class TravelOrderRepository extends BaseRepository
{
    public function model()
    {
        return TravelOrder::class;
    }

    public function create(TravelOrderData $data)
    {
        return $this->makeModel()->create($data->toArray());
    }
}

