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
        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'A' . $id,
                'status' => 'Available',
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'B' . $id,
                'status' => ($id > 3 && $id < 6) ? 'Reserved' : 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'C' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'D' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 1,
                'seat_number' => 'E' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'A' . $id,
                'status' => ($id > 1 && $id < 4) ? 'Reserved' : 'Available',
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'B' . $id,
                'status' => $id == 4 ? 'Reserved' : 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'C' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'D' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 2,
                'seat_number' => 'E' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'A' . $id,
                'status' => ($id > 2 && $id < 5) ? 'Reserved' : 'Available',
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'B' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'C' . $id,
                'status' => ($id > 1 && $id < 6) ? 'Reserved' : 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'D' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 3,
                'seat_number' => 'E' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }


        //Rạp Hải Phòng
        foreach (range(1, 6) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'A' . $id,
                'status' => 'Available',
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'B' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'C' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 4,
                'seat_number' => 'D' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }


        //Rạp Vĩnh Phúc
        foreach (range(1, 6) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'A' . $id,
                'status' => 'Available',
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'B' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'C' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 5,
                'seat_number' => 'D' . $id,
                'status' => ($id > 2 && $id < 6) ? 'Reserved' : 'Available',
                'price' => 40000,
            ]);
        }

        //Rạp Phú Thọ
        foreach (range(1, 6) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'A' . $id,
                'status' =>  $id < 3 ? 'Reserved' : 'Available',
                'price' => 80000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'B' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'C' . $id,
                'status' => 'Available',
                'price' => 60000,
            ]);
        }

        foreach (range(1, 8) as $id) {
            Seat::create([
                'theater_id' => 6,
                'seat_number' => 'D' . $id,
                'status' => 'Available',
                'price' => 40000,
            ]);
        }
        
    }
}
