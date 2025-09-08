<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TravelOrder>
 */
class TravelOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $diff = rand(15, 90);
        $departureAt = Carbon::now()->addDays($diff);
        return [
            'applicant_name' => fake()->name(),
            'destination' => fake()->city(),
            'departure_at' => $departureAt,
            'return_at' => Carbon::now()->addDays($diff+5),
            'user_id' => User::factory()->asClient()->create()->id,
        ];
    }

    public function withPassedDates(): static
    {
        $diff = rand(1, 10);
        $returnAt = Carbon::now()->subDays($diff);
        return $this->state(fn (array $attributes) => [
            'return_at' => $returnAt,
            'departure_at' => Carbon::now()->subDays($diff+2),
        ]);
    }

    public function forUser(int $userId): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $userId,
        ]);
    }

    public function forCurrentUser(): self
    {
        $userId = auth()->user()->id;
        return $this->forUser($userId);
    }
}
