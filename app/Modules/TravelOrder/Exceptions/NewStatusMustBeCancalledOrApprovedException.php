<?php

namespace App\Modules\TravelOrder\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NewStatusMustBeCancalledOrApprovedException extends Exception
{
    public function render(Request $request): JsonResponse
    {
        return $request->expectsJson()
            ? response()->json(['message' => 'Travel Order status must be changed to approved or cancelled.'], 422)
            : response()->json([], 422);
    }
}
