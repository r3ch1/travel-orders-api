<?php

namespace App\Modules\TravelOrder\Controllers;

use App\Modules\TravelOrder\Data\{TravelOrderData, TravelOrderIdData, TravelOrderQueryData};
use App\Modules\TravelOrder\UseCases\{CreateTravelOrderUseCase, UpdateTravelOrderUseCase, ShowTravelOrderUseCase, IndexTravelOrderUseCase};
use App\Modules\TravelOrder\Resources\{TravelOrderResource, TravelOrdersResource};

class TravelOrderController
{
    /**
     * Endpoint (GET): /travel-orders
     */
    public function index(TravelOrderQueryData $data, IndexTravelOrderUseCase $useCase)
    {
        return new TravelOrdersResource($useCase->execute($data));
    }

    /**
     * Endpoint (POST): /travel-orders
     */
    public function store(TravelOrderData $data, CreateTravelOrderUseCase $useCase): TravelOrderResource
    {
        return new TravelOrderResource($useCase->execute($data));
    }

    /**
     * Endpoint (PUT): /travel-orders/{id}
     */
    public function update(TravelOrderIdData $data, UpdateTravelOrderUseCase $useCase): TravelOrderResource
    {
        return new TravelOrderResource($useCase->execute($data));
    }

    /**
     * Endpoint (GET): /travel-orders/{id}
     */
    public function show(TravelOrderIdData $data, ShowTravelOrderUseCase $useCase): TravelOrderResource
    {
        return new TravelOrderResource($useCase->execute($data));
    }
}
