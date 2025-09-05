<?php

namespace App\Modules\TravelOrder\Controllers;

use App\Modules\TravelOrder\Data\{TravelOrderData, TravelOrderUpdateStatusData};
use App\Modules\TravelOrder\UseCases\{CreateTravelOrderUseCase, UpdateTravelOrderUseCase};
use App\Modules\TravelOrder\Resources\TravelOrderResource;

class TravelOrderController
{
    /**
     * Endpoint (GET): /travel-orders
     */
    public function index()
    {
        dd('akssi');
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
    public function update(TravelOrderUpdateStatusData $data, UpdateTravelOrderUseCase $useCase): TravelOrderResource
    {
        return new TravelOrderResource($useCase->execute($data));
    }
}
