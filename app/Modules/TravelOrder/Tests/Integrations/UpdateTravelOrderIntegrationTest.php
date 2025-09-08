<?php

namespace App\Modules\TravelOrder\Tests\Integrations;

use App\Models\TravelOrder;
use App\Models\User;
use App\Modules\TravelOrder\Enums\Status;
use App\Modules\TravelOrder\Tests\Assertables\TravelOrderAssertableJson;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UpdateTravelOrderIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected $routeUrl = 'api/v1/travel-orders';

    public function testNonAdminUserCannotChangeStatus()
    {
        $user = User::factory()->asClient()->create();
        Sanctum::actingAs($user);
        $travelOrder = TravelOrder::factory()->forCurrentUser()->create();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->put($this->routeUrl.'/'.$travelOrder->id);

        $response->assertUnauthorized();
    }

    public function testStatusFieldMustBeApprovedOrCancelled()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder = TravelOrder::factory()->create();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->put($this->routeUrl.'/'.$travelOrder->id);
        $response->assertUnprocessable();
        $this->assertEquals('Travel Order status must be changed to approved or cancelled.', $response->json('message'));

        $response = $this
            ->withHeader('Accept', 'application/json')
            ->put($this->routeUrl.'/'.$travelOrder->id, ['status' => 'dsa']);
        $response->assertUnprocessable();
        $errors = $response->json('errors');
        $this->assertArrayHasKey('status', $errors);
        $this->assertEquals("The status field must be one of the following values: 'requested', 'approved', 'cancelled'.", $response->json('errors.status.0'));
    }

    public function testOnlyApprovedTravelOrdercanbeCancelled()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder = TravelOrder::factory()->create();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->put($this->routeUrl.'/'.$travelOrder->id, ['status' => Status::CANCELLED->value])
            ->assertUnprocessable();

        $error = $response->json('message');
        $this->assertEquals('Only Approved Travel Order can be Cancelled.', $error);
    }

    public function testOnlyFutureTravelOrderCanBeUpdated()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder = TravelOrder::factory()->withPassedDates()->create();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->put($this->routeUrl.'/'.$travelOrder->id, ['status' => Status::APPROVED->value])
            ->assertUnprocessable();

        $error = $response->json('message');
        $this->assertEquals('Only Future Travel Order can be Updated.', $error);
    }

    public function testAdminUserCanChangeStatus()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder = TravelOrder::factory()->create();
        $response = $this
            ->withHeader('Accept', 'application/json')
            ->put($this->routeUrl.'/'.$travelOrder->id, ['status' => Status::APPROVED->value])
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                return $json->has('data', function (AssertableJson $json) {
                    TravelOrderAssertableJson::schema($json);
                });
            });
    }
}
