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
            'showtime_id' => 3,
            'seat_ids' => json_encode([42, 43]),
            'ticket_code' => 'HN002-1',
            'total_price' => 160000
        ]);

        Reservation::create([
            'user_id' => 2,
            'showtime_id' => 9,
            'seat_ids' => json_encode([98, 99, 100, 101]),
            'ticket_code' => 'HN003-1',
            'total_price' => 240000
        ]);

        Reservation::create([
            'user_id' => 3,
            'showtime_id' => 8,
            'seat_ids' => json_encode([52]),
            'ticket_code' => 'HN002-2',
            'total_price' => 60000
        ]);

        Reservation::create([
            'user_id' => 4,
            'showtime_id' => 11,
            'seat_ids' => json_encode([181, 182]),
            'ticket_code' => 'PT001-1',
            'total_price' => 160000
        ]);

        Reservation::create([
            'user_id' => 5,
            'showtime_id' => 13,
            'seat_ids' => json_encode([83, 84]),
            'ticket_code' => 'HN003-2',
            'total_price' => 160000
        ]);

        Reservation::create([
            'user_id' => 6,
            'showtime_id' => 14,
            'seat_ids' => json_encode([175, 176, 177]),
            'ticket_code' => 'VP001-1',
            'total_price' => 120000
        ]);

        Reservation::create([
            'user_id' => 6,
            'showtime_id' => 6,
            'seat_ids' => json_encode([12, 13]),
            'ticket_code' => 'HN001-1',
            'total_price' => 120000
        ]);
    }
}
