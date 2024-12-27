<?php

namespace App\Http\Services;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use Carbon\Carbon;

class SeatService
{
    public function getTrips()
    {
        return Trip::all();
    }

    public function getStations()
    {
        return Station::all();
    }

    public function getAvailableSeats($startStationId,$endStationId)
    {
        $stations = range($startStationId, $endStationId - 1);

        $bookedSeats = Booking::whereIn('start_station_id', $stations)
            ->where('date', date('Y-m-d'))
            ->get();
        if($bookedSeats->count() > 0){
            $bookedSeatsNumbers = $bookedSeats->pluck('seat_number');
            $availableSeats = Seat::whereNotIn('seat_number', $bookedSeatsNumbers)->get();
        }
        else{
            $availableSeats = Seat::all();
        }
        return $availableSeats;
    }

    public function bookSeat($request)
    {
        $seatNumber = $request->seat_number;
        $startStationId = $request->start_station_id;
        $endStationId = $request->end_station_id;
        $tripId = $request->trip_id;
        $bus = Trip::find($tripId)->bus;
        for($i = $startStationId; $i < $endStationId; $i++){
            $booking = new Booking();
            $booking->seat_number = $seatNumber;
            $booking->start_station_id = $i;
            $booking->date = Carbon::now();
            $booking->trip_id = $tripId;
            $booking->bus_id = $bus->id;
            $booking->save();
        }
        return true;
    }

}
