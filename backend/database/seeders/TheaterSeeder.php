<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Theater;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theater::create([
            'cinema_id' => 1,
            'theater_name' => 'HN001',
            'capacity' => 40,
            'status' => config('constants.THEATER_STATUS.AVAILABLE'),
        ]);

        Theater::create([
            'cinema_id' => 1,
            'theater_name' => 'HN002',
            'capacity' => 40,
            'status' => config('constants.THEATER_STATUS.AVAILABLE'),
        ]);

        Theater::create([
            'cinema_id' => 1,
            'theater_name' => 'HN003',
            'capacity' => 40,
            'status' => config('constants.THEATER_STATUS.AVAILABLE'),
        ]);

        Theater::create([
            'cinema_id' => 2,
            'theater_name' => 'HP001',
            'capacity' => 30,
            'status' => config('constants.THEATER_STATUS.AVAILABLE'),
        ]);

        Theater::create([
            'cinema_id' => 3,
            'theater_name' => 'VP001',
            'capacity' => 30,
            'status' => config('constants.THEATER_STATUS.AVAILABLE'),
        ]);

        Theater::create([
            'cinema_id' => 4,
            'theater_name' => 'PT001',
            'capacity' => 30,
            'status' => config('constants.THEATER_STATUS.AVAILABLE'),
        ]);
    }
}
