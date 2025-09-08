<?php

namespace App\Modules\TravelOrder\Tests\Assertables;

use Illuminate\Testing\Fluent\AssertableJson;

class TravelOrdersAssertableJson
{
    public static function schema(AssertableJson $json): AssertableJson
    {
        return $json->has('data', function (AssertableJson $json) {
            $json->whereType('travel_orders', 'array')
            ->when(! empty($json->toArray()['travel_orders']), function (AssertableJson $json) {
                $json->has('travel_orders', function (AssertableJson $json) {
                    $json->each(function (AssertableJson $json) {
                        TravelOrderAssertableJson::schema($json);
                    });
                });
            });
        })->etc();
    }
}
