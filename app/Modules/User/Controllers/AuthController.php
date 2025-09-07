<?php

namespace App\Modules\User\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Modules\User\Data\LoginData;
use App\Modules\User\UseCases\HandleLoginUseCase;

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
    public function register()
    {
        $request = request();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('travel-api')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function logout()
    {
        request()->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
