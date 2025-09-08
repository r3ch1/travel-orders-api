<?php

namespace App\Modules\TravelOrder\Tests\Assertables;

use Illuminate\Testing\Fluent\AssertableJson;

class TravelOrderAssertableJson
{
    public static function schema(AssertableJson $json): AssertableJson
    {
        return
            $json
                ->whereType('id', 'integer')
                ->whereType('applicant_name', 'string')
                ->whereType('destination', 'string')
                ->whereType('departure_at', 'string')
                ->whereType('return_at', 'string')
                ->whereType('status', 'string')
                ->whereType('updated_at', 'string')
                ->whereType('created_at', 'string');

    }
}
