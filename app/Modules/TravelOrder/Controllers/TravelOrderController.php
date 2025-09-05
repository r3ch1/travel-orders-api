<?php

namespace App\Modules\TravelOrder\Controllers;

use App\Modules\TravelOrder\Data\TravelOrderData;
use App\Modules\TravelOrder\UseCases\CreateTravelOrderUseCase;
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
    public function store(TravelOrderData $data, CreateTravelOrderUseCase $useCase)
    {
        return new TravelOrderResource($useCase->execute($data));
    }
}
