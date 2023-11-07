<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create([
            'user_id' => 2,
            'showtime_id' => 9,
            'seat_ids' => [],
            'ticket_code' => 'HN002-1',
            'total_price' => 
        ]);
    }
}
