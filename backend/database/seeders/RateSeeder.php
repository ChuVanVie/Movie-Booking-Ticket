<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rate;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create([
            'user_id' => 2,
            'movie_id' => 6,
            'star' => 9,
            'comment' => 'Hayy quái cã chưởng !!'
        ]);
    }
}
