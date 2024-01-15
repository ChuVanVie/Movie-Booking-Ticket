<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeatStatus;

class SeatStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ($id > 2 && $id < 6) ? 'Reserved' : 'Available'
        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 1,
                'seat_id' => $id + 80,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }
        
        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 2,
                'seat_id' => $id,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 3,
                'seat_id' => $id + 40,
                'status' => in_array($id, [42, 43]) ? config('constants.SEAT_STATUS.RESERVED') : config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 30) as $id) {
            SeatStatus::create([
                'showtime_id' => 4,
                'seat_id' => $id + 150,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 5,
                'seat_id' => $id + 80,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 6,
                'seat_id' => $id,
                'status' => in_array($id, [12, 13]) ? config('constants.SEAT_STATUS.RESERVED') : config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 7,
                'seat_id' => $id,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 8,
                'seat_id' => $id + 40,
                'status' => in_array($id, [52]) ? config('constants.SEAT_STATUS.RESERVED') : config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 9,
                'seat_id' => $id + 80,
                'status' => in_array($id, [98, 99, 100, 101]) ? config('constants.SEAT_STATUS.RESERVED') : config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 30) as $id) {
            SeatStatus::create([
                'showtime_id' => 10,
                'seat_id' => $id + 120,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 30) as $id) {
            SeatStatus::create([
                'showtime_id' => 11,
                'seat_id' => $id + 180,
                'status' => in_array($id, [181, 182]) ? config('constants.SEAT_STATUS.RESERVED') : config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 12,
                'seat_id' => $id,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 13,
                'seat_id' => $id + 80,
                'status' => in_array($id, [83, 84]) ? config('constants.SEAT_STATUS.RESERVED') : config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 30) as $id) {
            SeatStatus::create([
                'showtime_id' => 14,
                'seat_id' => $id + 150,
                'status' => in_array($id, [175, 176, 177]) ? config('constants.SEAT_STATUS.RESERVED') : config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 15,
                'seat_id' => $id + 40,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 16,
                'seat_id' => $id,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }

        foreach (range(1, 40) as $id) {
            SeatStatus::create([
                'showtime_id' => 17,
                'seat_id' => $id + 80,
                'status' => config('constants.SEAT_STATUS.AVAILABLE'),
            ]);
        }
    }
}