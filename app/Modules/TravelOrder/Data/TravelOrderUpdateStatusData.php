<?php

namespace App\Modules\TravelOrder\Data;

use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Support\Validation\ValidationContext;
use App\Modules\TravelOrder\Enums\Status;

class TravelOrderUpdateStatusData extends Data
{
    public function __construct(
        #[FromRouteParameter('travel_order')]
        public ?int $id,
        public ?string $status,
        #[FromAuthenticatedUserProperty('api','id')]
        public $user_id=1
        ) {
            $this->id = request()->route('travel_order');
            $this->status ??= Status::Requested->value;
        }

    public static function rules(ValidationContext $context): array
    {
        return [
            'status' => ['nullable', Rule::in(Status::cases())]
        ];
    }
}
