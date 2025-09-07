<?php

namespace App\Modules\TravelOrder\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OnlyApprovedTravelOrderCanBeCancelledException extends Exception
{
    public function render(Request $request): JsonResponse
    {
        return $request->expectsJson()
            ? response()->json(['error' => 'Only Approved Travel Order can be Cancelled.'], 422)
            : response()->json([], 422);
    }
}
