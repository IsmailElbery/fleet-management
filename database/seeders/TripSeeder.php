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
        DB::table('trips')->insert([
            'bus_id' => 1,
            'start_station_id' => 1,
            'end_station_id' => 5,
            'name' => 'Trip 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
