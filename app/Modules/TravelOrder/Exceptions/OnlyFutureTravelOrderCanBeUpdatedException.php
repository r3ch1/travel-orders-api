<?php

namespace App\Modules\TravelOrder\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OnlyFutureTravelOrderCanBeUpdatedException extends Exception
{
    public function render(Request $request): JsonResponse
    {
        return $request->expectsJson()
            ? response()->json(['message' => 'Only Future Travel Order can be Updated.'], 422)
            : response()->json([], 422);
    }
}
