<?php

namespace App\Modules\TravelOrder\Data;

use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Support\Validation\ValidationContext;
use App\Modules\TravelOrder\Enums\Status;

#[MapName(SnakeCaseMapper::class)]
class TravelOrderData extends Data
{
    public function __construct(
        public string $applicant_name,
        public string $destination,
        public CarbonImmutable $departure_at,
        public CarbonImmutable $return_at,
        public ?string $status,
        #[FromAuthenticatedUserProperty('api','id')]
        public $user_id=1
        ) {
            $this->status ??= Status::Requested->value;
        }

    public static function rules(ValidationContext $context): array
    {
        return [
            'departure_at' => ['required', Rule::date()->format('Y-m-d\TH:i:sP')],
            'return_at' => ['required', Rule::date()->format('Y-m-d\TH:i:sP'), 'after:departure_at'],
            'status' => ['nullable', Rule::in(Status::cases())]
        ];
    }
}
