<?php

namespace App\Modules\TravelOrder\Data;

use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Support\Validation\ValidationContext;
use App\Modules\TravelOrder\Enums\Status;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\FromRouteParameter;

#[MapName(SnakeCaseMapper::class)]
class TravelOrderIdData extends Data
{
    public function __construct(
        #[FromRouteParameter('travel_order')]
        public int $id,
        public string $status
        ) {
            $this->status ??= Status::REQUESTED->value;
        }

    public static function rules(ValidationContext $context): array
    {
        return [
            'status' => ['required', Rule::in(Status::cases())]
        ];
    }
}
