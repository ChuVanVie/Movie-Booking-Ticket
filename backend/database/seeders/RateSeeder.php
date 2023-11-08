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
        Rate::create([
            'user_id' => 2,
            'movie_id' => 2,
            'star' => 8,
            'comment' => 'Hayy quái cã chưởng  lun á!!'
        ]);

        Rate::create([
            'user_id' => 2,
            'movie_id' => 6,
            'star' => 9,
            'comment' => 'Bọn titan ngu đánh nhau hay vcl!!'
        ]);

        Rate::create([
            'user_id' => 3,
            'movie_id' => 6,
            'star' => 8,
            'comment' => 'Goodniee!!'
        ]);

        Rate::create([
            'user_id' => 4,
            'movie_id' => 6,
            'star' => 9,
            'comment' => 'Trời ơi mãn nhãnaaaa!!'
        ]);

        Rate::create([
            'user_id' => 5,
            'movie_id' => 7,
            'star' => 6,
            'comment' => 'Xem cũng tạm ổn, hicc'
        ]);

        Rate::create([
            'user_id' => 6,
            'movie_id' => 7,
            'star' => 9,
            'comment' => 'Waoo đáng để coii nha mn ^^'
        ]);

        Rate::create([
            'user_id' => 6,
            'movie_id' => 4,
            'star' => 7,
            'comment' => 'Phim kiểu ... thiếu nước cam quá =(('
        ]);
    }
}
