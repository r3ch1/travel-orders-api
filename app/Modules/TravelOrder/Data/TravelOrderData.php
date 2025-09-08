<?php

namespace App\Modules\TravelOrder\Data;

use App\Modules\TravelOrder\Enums\Status;
use Carbon\CarbonImmutable;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\FromAuthenticatedUserProperty;
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
        #[FromAuthenticatedUserProperty('sanctum','id')]
        public $user_id,
        ) {
            $this->status ??= Status::REQUESTED->value;
        }

    public static function rules(ValidationContext $context): array
    {
        return [
            'departure_at' => ['required', Rule::date()->format(self::DATE_FORMAT), 'after:'.date('Y-m-d', strtotime(now().'+ 1 week'))],
            'return_at' => ['required', Rule::date()->format(self::DATE_FORMAT), 'after:departure_at'],
            'status' => ['nullable', Rule::in(Status::cases())]
        ];
    }
}
