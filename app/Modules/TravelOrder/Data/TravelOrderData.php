<?php

namespace App\Modules\TravelOrder\Data;

use App\Modules\TravelOrder\Enums\Status;
use Carbon\CarbonImmutable;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

#[MapName(SnakeCaseMapper::class)]
class TravelOrderData extends Data
{
    private const DATE_FORMAT = 'Y-m-d H:i';

    public function __construct(
        public string $applicantName,
        public string $destination,
        #[WithCast(DateTimeInterfaceCast::class, format: self::DATE_FORMAT)]
        public CarbonImmutable $departureAt,

        #[WithCast(DateTimeInterfaceCast::class, format: self::DATE_FORMAT)]
        public CarbonImmutable $returnAt,
        public ?string $status,
        #[FromAuthenticatedUserProperty('api','id')]
        public $user_id=1
        ) {
            $this->status ??= Status::REQUESTED->value;
        }

    public static function rules(ValidationContext $context): array
    {
        return [
            'departureAt' => ['required', Rule::date()->format('Y-m-d H:i')],
            'returnAt' => ['required', Rule::date()->format('Y-m-d H:i'), 'after:departure_at'],
            'status' => ['nullable', Rule::in(Status::cases())]
        ];
    }
}
