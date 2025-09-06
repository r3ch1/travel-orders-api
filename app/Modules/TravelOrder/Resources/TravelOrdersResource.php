<?php

namespace App\Modules\TravelOrder\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TravelOrdersResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'travelOrders' => TravelOrderResource::collection($this->collection)
        ];
    }
}
