<?php

namespace App\Modules\TravelOrder\Tests\Integrations;

use App\Models\TravelOrder;
use App\Models\User;
use App\Modules\TravelOrder\Enums\Status;
use App\Modules\TravelOrder\Tests\Assertables\TravelOrdersAssertableJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class IndexTravelOrderIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected $routeUrl = 'api/v1/travel-orders';

    public function testNonAdminUserOnlyCanSeeOwnTravelOrders()
    {
        $user = User::factory()->asClient()->create();
        Sanctum::actingAs($user);
        $travelOrder1 = TravelOrder::factory()->forCurrentUser()->create();
        $travelOrder2 = TravelOrder::factory()->create();

        $response = $this
            ->withHeader('Accept', 'application/json')
            ->get($this->routeUrl)
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                TravelOrdersAssertableJson::schema($json);
            });

        $data = $response->json('data.travel_orders');
        $this->assertGreaterThanOrEqual(1, count($data));

        $ids = collect($data)->pluck('id')->toArray();
        $this->assertContains($travelOrder1->id, $ids);
        $this->assertNotContains($travelOrder2->id, $ids);
    }

    public function testAdminUserCanSeeAllTravelOrders()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder1 = TravelOrder::factory()->forCurrentUser()->create();
        $travelOrder2 = TravelOrder::factory()->create();

        $response = $this
            ->withHeader('Accept', 'application/json')
            ->get($this->routeUrl)
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                TravelOrdersAssertableJson::schema($json);
            });

        $data = $response->json('data.travel_orders');
        $this->assertGreaterThanOrEqual(2, count($data));

        $ids = collect($data)->pluck('id')->toArray();
        $this->assertContains($travelOrder1->id, $ids);
        $this->assertContains($travelOrder2->id, $ids);
    }

    public function testTravelOrdersShouldFilterByDateRange()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder1 = TravelOrder::factory()->forCurrentUser()->create();
        $travelOrder2 = TravelOrder::factory()->forCurrentUser()->withPassedDates()->create();

        $response = $this
            ->withHeader('Accept', 'application/json')
            ->get($this->routeUrl.'?'.http_build_query([
                'date_start' => date('Y-m-d'),
                'date_end' => date('Y-m-d', strtotime(now().' + 1 year'))
            ]))
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                TravelOrdersAssertableJson::schema($json);
            });

        $data = $response->json('data.travel_orders');
        $this->assertEquals(1, count($data));
        $this->assertEquals(1, $response->json('meta.total'));

        $ids = collect($data)->pluck('id')->toArray();
        $this->assertContains($travelOrder1->id, $ids);
        $this->assertNotContains($travelOrder2->id, $ids);
    }

    public function testTravelOrderShouldFilterByStatus()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder1 = TravelOrder::factory()->forCurrentUser()->create();
        $travelOrder2 = TravelOrder::factory()->forCurrentUser()->create(['status' => Status::APPROVED->value]);

        $response = $this
            ->withHeader('Accept', 'application/json')
            ->get($this->routeUrl.'?'.http_build_query([
                'status' => Status::APPROVED->value
            ]))
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                TravelOrdersAssertableJson::schema($json);
            });

        $data = $response->json('data.travel_orders');
        $this->assertEquals(1, count($data));
        $this->assertEquals(1, $response->json('meta.total'));

        $ids = collect($data)->pluck('id')->toArray();
        $this->assertContains($travelOrder2->id, $ids);
        $this->assertNotContains($travelOrder1->id, $ids);
    }

    public function testTravelOrderShouldFilterByDestination()
    {
        $user = User::factory()->asAdmin()->create();
        Sanctum::actingAs($user);
        $travelOrder1 = TravelOrder::factory()->forCurrentUser()->create();
        $travelOrder2 = TravelOrder::factory()->forCurrentUser()->create(['status' => Status::APPROVED->value]);

        $response = $this
            ->withHeader('Accept', 'application/json')
            ->get($this->routeUrl.'?'.http_build_query([
                'destination' => $travelOrder2->destination
            ]))
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                TravelOrdersAssertableJson::schema($json);
            });

        $data = $response->json('data.travel_orders');
        $this->assertEquals(1, count($data));
        $this->assertEquals(1, $response->json('meta.total'));

        $ids = collect($data)->pluck('id')->toArray();
        $this->assertContains($travelOrder2->id, $ids);
        $this->assertNotContains($travelOrder1->id, $ids);
    }
}
