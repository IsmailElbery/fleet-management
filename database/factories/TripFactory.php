<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'bus_id' => Bus::factory(),
            'start_station_id' => Station::factory(),
            'end_station_id' => Station::factory(),
        ];
    }
}
