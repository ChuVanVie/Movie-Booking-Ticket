<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this
            ->call([
                UserSeeder::class,
                CategorySeeder::class,
                CountrySeeder::class,
                MovieSeeder::class,
                CategoryOfMovieSeeder::class,
                CinemaSeeder::class,
                TheaterSeeder::class,
                SeatSeeder::class,
                ShowtimeSeeder::class,
                ReservationSeeder::class,
                RateSeeder::class,
                PaymentHistorySeeder::class,
            ]);
    }
}
