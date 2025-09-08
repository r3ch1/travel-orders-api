<?php

namespace App\Modules\TravelOrder\UseCases;

use App\Modules\TravelOrder\Data\TravelOrderQueryData;
use App\Modules\TravelOrder\Repositories\TravelOrderRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexTravelOrderUseCase
{
    public function execute(TravelOrderQueryData $data): LengthAwarePaginator
    {
        return app(TravelOrderRepository::class)->getAll($data);
    }
}
