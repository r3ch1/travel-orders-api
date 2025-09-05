<?php

namespace App\Modules\TravelOrder\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelOrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'applicant_name' => $this->applicant_name,
            'destination' => $this->destination,
            'departure_at' => $this->departure_at->format('Y-m-d\TH:i:sP'),
            'return_at' => $this->return_at->format('Y-m-d\TH:i:sP'),
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
