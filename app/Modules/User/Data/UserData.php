<?php

namespace App\Modules\User\Data;

use Illuminate\Support\Facades\Hash;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;
use Spatie\LaravelData\Data;

#[MapName(SnakeCaseMapper::class)]
class UserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        ) {}

    public static function rules(ValidationContext $context): array
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ];
    }

    public function toArrayModel()
    {
        $data = $this->toArray();
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}
