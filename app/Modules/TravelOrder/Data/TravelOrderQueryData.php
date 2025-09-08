<?php

namespace App\Modules\TravelOrder\Data;

use App\Modules\TravelOrder\Enums\Status;
use Carbon\CarbonImmutable;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;

#[MapName(SnakeCaseMapper::class)]
class TravelOrderQueryData extends Data
{
    private const DATE_FORMAT = 'Y-m-d';

    public function __construct(

        #[WithCast(DateTimeInterfaceCast::class, format: self::DATE_FORMAT)]
        public ?CarbonImmutable $dateStart = null,

        #[WithCast(DateTimeInterfaceCast::class, format: self::DATE_FORMAT)]
        public ?CarbonImmutable $dateEnd = null,

        public ?string $status,
        public ?string $destination,
        #[Min(1)]
        public ?int $page = null,

        #[Min(1), Max(100)]
        public ?int $perPage = null,
        ) {
            $this->page ??= 1;
            $this->perPage ??= config('app.pagination.per_page');
        }

    public static function rules(ValidationContext $context): array
    {
        $requireDateStart = ! empty($context->payload['dateEnd']);
        $requireDateEnd = ! empty($context->payload['dateStart']);

        return [
            'status' => ['nullable', Rule::in(Status::cases())],
            'dateStart' => ['nullable', new RequiredIf($requireDateStart), Rule::date()->format('Y-m-d')],
            'dateEnd' => ['nullable', new RequiredIf($requireDateEnd), Rule::date()->format('Y-m-d')],
        ];
    }
}
