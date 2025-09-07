<?php

namespace App\Modules\User\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;
use Spatie\LaravelData\Data;

#[MapName(SnakeCaseMapper::class)]
class LoginData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
        ) {}

    public static function rules(ValidationContext $context): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'size:8']
        ];
    }
}
