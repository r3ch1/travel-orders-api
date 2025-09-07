<?php

namespace App\Modules\User\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Modules\User\Data\LoginData;
use App\Modules\User\Data\UserData;
use App\Modules\User\UseCases\HandleLoginUseCase;
use App\Modules\User\UseCases\HandleRegisterUseCase;

class AuthController
{
    /**
     * Endpoint (POST): /login
     */
    public function login(LoginData $data, HandleLoginUseCase $useCase)
    {
        return $useCase->execute($data);
    }

    /**
     * Endpoint (POST): /register
     */
    public function register(UserData $data, HandleRegisterUseCase $useCase)
    {
        return $useCase->execute($data);
    }

    public function logout()
    {
        request()->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
