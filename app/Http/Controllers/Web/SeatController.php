<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvailableSeatRequest;
use App\Http\Requests\BookSeatRequest;
use App\Http\Services\SeatService;
use App\Models\Booking;
use App\Models\Seat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    private $seatService;

    public function __construct(SeatService $seatService)
    {
        $this->seatService = $seatService;
    }

    public function index()
    {
        $trips = $this->seatService->getTrips();
        $stations = $this->seatService->getStations();
        return view('seats.index', [
            'trips' => $trips,
            'stations' => $stations
        ]);
    }

    public function search(AvailableSeatRequest $request)
    {
        try {
            $startStationId = $request->start_station_id;
            $endStationId = $request->end_station_id;
            $trip_id = $request->trip_id;
            $availableSeats = $this->seatService->getAvailableSeats($startStationId, $endStationId);
            return view('seats.available', [
                'availableSeats' => $availableSeats,
                'startStationId' => $startStationId,
                'trip_id' => $trip_id,
                'endStationId' => $endStationId
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    public function book(BookSeatRequest $request)
    {
        try {
            $this->seatService->bookSeat($request);
            return redirect()->route('seats.index')->with('success', 'Seat booked successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('seats.index')->with('error', $th->getMessage());
        }
    }
}

