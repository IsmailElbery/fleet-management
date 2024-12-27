<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add 12 seats to the seats table and created_at and updated_at columns will be filled with the current timestamp
        $seats = [];
        for ($i = 1; $i <= 12; $i++) {
            $seats[] = [
                'seat_number' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        DB::table('seats')->insert($seats);
    }
}
