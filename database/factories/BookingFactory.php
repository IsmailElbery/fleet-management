<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trip_id' => Trip::factory(),
            'bus_id' => Bus::factory(),
            'seat_number' => $this->faker->unique()->randomNumber(2),
            'start_station_id' => Station::factory(),
            'date' => $this->faker->date(),
        ];
    }
}
