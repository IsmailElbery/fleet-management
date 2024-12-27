<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bus = [
            [
                'bus_number' => 'A123',
                'capacity' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('buses')->insert($bus);
    }
}
