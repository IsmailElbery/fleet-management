<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvailableSeatRequest;
use App\Http\Requests\BookSeatRequest;
use App\Http\Resources\SeatResource;
use App\Http\Services\SeatService;
use Illuminate\Http\Request;
use App\Models\TripStop;
use App\Models\Seat;
use App\Models\Bus;
use App\Models\TripSegment;

class SeatController extends Controller
{
    private $seatService;

    public function __construct(SeatService $seatService)
    {
        $this->seatService = $seatService;
    }

    public function getAvailableSeats(AvailableSeatRequest $request)
    {
        try {
            $startStationId = $request->start_station_id;
            $endStationId = $request->end_station_id;
            $availableSeats = $this->seatService->getAvailableSeats($startStationId, $endStationId);
            if(!$availableSeats){
                return response()->json(['message' => 'No available seats for the selected stations'], 404);
            }

            return $this->response(SeatResource::collection($availableSeats));
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return $this->response([], 500, ['message' => $message]);
        }

    }

    public function bookSeat(BookSeatRequest $request)
    {
        $bookedSeat = $this->seatService->bookSeat($request);
        if (!$bookedSeat) {
            return $this->response([], 409, ['message' => 'Seat not available']);
        }
        return $this->response(['message' => 'Seat booked successfully']);
    }
}
