<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bus = DB::table('buses')->first();
        $startStation = DB::table('stations')->first();
        $endStation = DB::table('stations')->skip(4)->first();
        DB::table('trips')->insert([
            'bus_id' => $bus->id,
            'start_station_id' => $startStation->id,
            'end_station_id' => $endStation->id,
            'name' => 'Trip 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
