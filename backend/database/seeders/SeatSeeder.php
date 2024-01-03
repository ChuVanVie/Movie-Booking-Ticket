<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'status' => ($id > 1 && $id < 6) ? 'Reserved' : 'Available',

        //Rạp Hà Nội
        //HN001
        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'A' . $id,
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'B' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'C' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'D' . $id,
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'E' . $id,
                'price' => 40000,
            ]);
        }

        //HN002
        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'A' . $id,
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'B' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'C' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'D' . $id,
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'E' . $id,
                'price' => 40000,
            ]);
        }

        //HN003
        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'A' . $id,
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'B' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'C' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'D' . $id,
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'E' . $id,
                'price' => 40000,
            ]);
        }


        //Rạp Hải Phòng
        //HP001
        foreach (range(1, 6) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'A' . $id,
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'B' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'C' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'D' . $id,
                'price' => 40000,
            ]);
        }


        //Rạp Vĩnh Phúc
        //VP001
        foreach (range(1, 6) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'A' . $id,
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'B' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'C' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'D' . $id,
                'price' => 40000,
            ]);
        }

        //Rạp Phú Thọ
        //PT001
        foreach (range(1, 6) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'A' . $id,
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'B' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'C' . $id,
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'D' . $id,
                'price' => 40000,
            ]);
        }
        
    }
}
