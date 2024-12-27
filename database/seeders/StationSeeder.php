<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stations')->insert([
            ['name' => 'Cairo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Giza', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AlFayyum', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AlMinya', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Asyut', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
