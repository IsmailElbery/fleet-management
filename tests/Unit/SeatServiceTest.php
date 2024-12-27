<?php
namespace Tests\Unit;

use App\Http\Requests\BookSeatRequest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Services\SeatService;
use App\Models\Booking;
use App\Models\Bus;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;

class SeatServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $seatService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seatService = new SeatService();
    }

    public function test_getTrips_returns_all_trips()
    {
        Trip::factory()->count(3)->create();

        $trips = $this->seatService->getTrips();

        $this->assertCount(3, $trips);
    }

    public function test_getStations_returns_all_stations()
    {
        Station::factory()->count(5)->create();

        $stations = $this->seatService->getStations();

        $this->assertCount(5, $stations);
    }

    /** @test */
    public function getAvailableSeats_returns_correct_seats()
    {
        $startStationId = 1;
        $endStationId = 3;

        $seat1 = Seat::factory()->create(['seat_number' => 1]);
        $seat2 = Seat::factory()->create(['seat_number' => 2]);

        Booking::factory()->create(['seat_number' => 1, 'start_station_id' => 1, 'date' => now()]);

        $availableSeats = $this->seatService->getAvailableSeats($startStationId, $endStationId);

        $this->assertCount(1, $availableSeats);
        $this->assertEquals(2, $availableSeats->first()->seat_number);
    }

    /** @test */
/** @test */
public function bookSeat_books_a_seat_successfully()
{
    $startStation = Station::factory()->create();
    $endStation = Station::factory()->create();

    $seat = Seat::factory()->create(['seat_number' => 1]);

    $bus = Bus::factory()->create();
    $trip = Trip::factory()->create([
        'bus_id' => $bus->id,
        'start_station_id' => $startStation->id,
        'end_station_id' => $endStation->id
    ]);

    $request = new BookSeatRequest([
        'seat_number' => 1,
        'start_station_id' => $startStation->id,
        'end_station_id' => $endStation->id,
        'trip_id' => $trip->id
    ]);

    $this->seatService->bookSeat($request);

    $this->assertDatabaseHas('booking', [
        'seat_number' => 1,
        'start_station_id' => $startStation->id,
        'date' => date('Y-m-d'),
        'trip_id' => $trip->id,
        'bus_id' => $bus->id
    ]);
}



}
