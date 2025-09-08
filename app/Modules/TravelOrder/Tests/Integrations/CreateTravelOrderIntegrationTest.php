<?php

namespace App\Modules\TravelOrder\Tests\Integrations;

use App\Models\TravelOrder;
use App\Models\User;
use App\Modules\TravelOrder\Tests\Assertables\TravelOrderAssertableJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CreateTravelOrderIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected $routeUrl = 'api/v1/travel-orders';

    public function testValidateRequiredFields()
    {
        $user = User::factory()->asClient()->create();
        Sanctum::actingAs($user);
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->post($this->routeUrl)
            ->assertUnprocessable();

        $errors = $response->json('errors');
        $requiredFields = ['applicant_name', 'destination', 'departure_at', 'return_at', ];
        foreach ($requiredFields as $requiredField) {
            $this->assertArrayHasKey($requiredField, $errors);
        }
    }

    public function testDepartureAtMustBeAfterNextWeek()
    {
        $user = User::factory()->asClient()->create();
        Sanctum::actingAs($user);

        $travelOrder = TravelOrder::factory()->withPassedDates()->forCurrentUser()->make();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->post($this->routeUrl, [
                ...$travelOrder->toArray(),
                ...[
                    'departure_at' => $travelOrder->departure_at->format('Y-m-d H:i'),
                    'return_at' => $travelOrder->return_at->format('Y-m-d H:i')
                    ]
            ])
            ->assertUnprocessable();
        $errors = $response->json('errors');
        $msg = 'The departure at field must be a date after '.date('Y-m-d', strtotime(now().'+ 1 week')).'.';
        $this->assertEquals($msg, $response->json('errors.departure_at.0'));
        $this->assertArrayHasKey('departure_at', $errors);
    }

    public function testReturnAtMustBeAfterDepartureAt()
    {
        $user = User::factory()->asClient()->create();
        Sanctum::actingAs($user);

        $travelOrder = TravelOrder::factory()->forCurrentUser()->make();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->post($this->routeUrl, [
                ...$travelOrder->toArray(),
                ...[
                    'departure_at' => $travelOrder->departure_at->format('Y-m-d H:i'),
                    'return_at' => $travelOrder->departure_at->subDays(2)->format('Y-m-d H:i')
                    ]
            ])
            ->assertUnprocessable();
        $errors = $response->json('errors');
        $this->assertEquals('The return at field must be a date after departure at.', $response->json('errors.return_at.0'));
        $this->assertArrayHasKey('return_at', $errors);
    }

    public function testDepartureAtAndReturnAtDateFormat()
    {
        $user = User::factory()->asClient()->create();
        Sanctum::actingAs($user);

        $travelOrder = TravelOrder::factory()->forCurrentUser()->make();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->post($this->routeUrl, [
                ...$travelOrder->toArray(),
                ...[
                    'departure_at' => 'dsa',
                    'return_at' => 'dsa'
                    ]
            ])
            ->assertUnprocessable();
        $errors = $response->json('errors');
        $this->assertEquals('The return at field must match the format Y-m-d H:i.', $response->json('errors.return_at.0'));
        $this->assertEquals('The departure at field must match the format Y-m-d H:i.', $response->json('errors.departure_at.0'));
        $this->assertArrayHasKey('return_at', $errors);
        $this->assertArrayHasKey('departure_at', $errors);
    }

    public function testTravelOrderHappyPath()
    {
        $user = User::factory()->asClient()->create();
        Sanctum::actingAs($user);
        $travelOrder = TravelOrder::factory()->forCurrentUser()->make();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->post($this->routeUrl, [
                ...$travelOrder->toArray(),
                ...[
                    'departure_at' => $travelOrder->departure_at->format('Y-m-d H:i'),
                    'return_at' => $travelOrder->return_at->format('Y-m-d H:i')
                    ]
                ])
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                return $json->has('data', function (AssertableJson $json) {
                    TravelOrderAssertableJson::schema($json);
                });
            });
    }
}
