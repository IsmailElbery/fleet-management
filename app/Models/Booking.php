<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['seat_number', 'start_station_id', 'date', 'trip_id', 'bus_id'];
    protected $table = 'booking';

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
