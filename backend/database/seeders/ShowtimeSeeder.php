<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Showtime;


class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Showtime::create([
            'movie_id' => 1,
            'cinema_id' => 1,
            'theater_id' => 3,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '12/02/2024 14:30'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '12/02/2024 17:00'),
            'status' => config('constants.SHOWTIME_STATUS.UPCOMING')
        ]);

        Showtime::create([
            'movie_id' => 2,
            'cinema_id' => 1,
            'theater_id' => 1,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 16:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 17:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 2,
            'cinema_id' => 1,
            'theater_id' => 2,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '09/02/2024 21:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '09/02/2024 22:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 2,
            'cinema_id' => 3,
            'theater_id' => 5,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 16:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 17:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 3,
            'cinema_id' => 1,
            'theater_id' => 3,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 20:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 21:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 4,
            'cinema_id' => 1,
            'theater_id' => 1,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '10/02/2024 20:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '10/02/2024 21:30'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 5,
            'cinema_id' => 1,
            'theater_id' => 1,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '11/02/2024 20:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '11/02/2024 22:30'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 6,
            'cinema_id' => 1,
            'theater_id' => 2,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '11/02/2024 20:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '11/02/2024 21:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 6,
            'cinema_id' => 1,
            'theater_id' => 3,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '12/02/2024 21:30'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '12/02/2024 22:30'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 6,
            'cinema_id' => 2,
            'theater_id' => 4,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '11/02/2024 20:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '11/02/2024 21:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 6,
            'cinema_id' => 4,
            'theater_id' => 6,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '12/02/2024 15:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '12/02/2024 16:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 7,
            'cinema_id' => 1,
            'theater_id' => 1,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '08/02/2024 20:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '08/02/2024 21:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 7,
            'cinema_id' => 1,
            'theater_id' => 3,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '10/02/2024 18:30'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '10/02/2024 19:30'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 7,
            'cinema_id' => 3,
            'theater_id' => 5,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '10/02/2024 19:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '10/02/2024 20:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 8,
            'cinema_id' => 1,
            'theater_id' => 2,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 19:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 20:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 9,
            'cinema_id' => 1,
            'theater_id' => 1,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 21:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '13/02/2024 22:00'),
            'status' => config('constants.SHOWTIME_STATUS.NOW_SHOWING')
        ]);

        Showtime::create([
            'movie_id' => 10,
            'cinema_id' => 1,
            'theater_id' => 3,
            'start_time' => Carbon::createFromFormat('d/m/Y H:i', '15/02/2024 21:00'),
            'end_time' => Carbon::createFromFormat('d/m/Y H:i', '15/02/2024 22:00'),
            'status' => config('constants.SHOWTIME_STATUS.UPCOMING')
        ]);
    }
}
