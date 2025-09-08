<?php

namespace App\Modules\User\UseCases;

use App\Modules\User\Data\UserData;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class HandleRegisterUseCase
{
    public function execute(UserData $data): JsonResponse
    {
        $newUser = app(UserRepository::class)->create($data);
        $token = $newUser->createToken('travel-api')->plainTextToken;
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $newUser,
            'token' => $token
        ], 201);
    }
}
