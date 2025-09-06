<?php

namespace App\Modules\TravelOrder\Repositories;

use App\Models\TravelOrder;
use App\Modules\TravelOrder\Data\TravelOrderData;
use App\Modules\TravelOrder\Data\TravelOrderIdData;
use App\Modules\TravelOrder\Data\TravelOrderQueryData;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class TravelOrderRepository extends BaseRepository
{
    public function model()
    {
        return TravelOrder::class;
    }

    public function query()
    {
        return $this->makeModel()
            ->byLoggedUser()
            ->newQuery();
    }

    public function findById($id): TravelOrder
    {
        return $this->query()->findOrFail($id);
    }

    public function create(TravelOrderData $data): TravelOrder
    {
        return $this->makeModel()->create($data->toArray());
    }

    public function update(TravelOrder $travelOrder, TravelOrderIdData $data): TravelOrder
    {
        $travelOrder->update($data->toArray());
        return $travelOrder->fresh();
    }

    public function baseFilter(TravelOrderQueryData $data): Builder
    {
        return $this->query()
            ->when(
                $data->status,
                fn (Builder $query) => $query->where('status', $data->status)
            )
            ->when(
                $data->destination,
                fn (Builder $query) => $query->where('destination', 'LIKE', trim($data->destination).'%')
            )
            ->when(
                ! empty($data->dateStart),
                fn (Builder $query) => $query->datesStartAt($data->dateStart)
            )
            ->when(
                ! empty($data->dateEnd),
                fn (Builder $query) => $query->datesEndAt($data->dateEnd)
            );
    }

    public function getAll(TravelOrderQueryData $data): LengthAwarePaginator
    {
        $query = $this->baseFilter($data);
        return $query
            ->paginate(
                perPage: $data->perPage,
                page: $data->page
            );
    }
}

