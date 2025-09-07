<?php

namespace App\Modules\TravelOrder\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NewStatusNeedToBeCancalledOrApprovedException extends Exception
{
    public function render(Request $request): JsonResponse
    {
        return $request->expectsJson()
            ? response()->json(['error' => 'Travel Order status only can be changed to approved or cancelled.'], 422)
            : response()->json([], 422);
    }
}
