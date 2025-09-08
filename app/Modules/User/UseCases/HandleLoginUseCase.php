<?php

namespace App\Modules\User\UseCases;

use App\Modules\User\Data\LoginData;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class HandleLoginUseCase
{
    public function execute(LoginData $data): JsonResponse
    {
        if (Auth::attempt($data->toArray())) {
            $token = Auth::user()->createToken('travel-api')->plainTextToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
