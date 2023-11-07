<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cinema;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cinema::create([
            'cinema_name' => 'Teeiv Hà Nội',
            'slug' => 'teeiv-ha-noi',
            'address' => 'số 15, đường Nguyễn Quốc Tuấn, Đống Đa, Hà Nội',
            'phone' => '0936113502',
        ]);

        Cinema::create([
            'cinema_name' => 'Teeiv Hải Phòng',
            'slug' => 'teeiv-hai-phong',
            'address' => '22 Nguyễn Huệ, Hải An, Hải Phòng',
            'phone' => '0359111306',
        ]);

        Cinema::create([
            'cinema_name' => 'Teeiv Vĩnh Phúc',
            'slug' => 'teeiv-vinh-phuc',
            'address' => '37 Chu Văn An, Mê Linh, Vĩnh Yên, Vĩnh Phúc',
            'phone' => '0944213555',
        ]);

        Cinema::create([
            'cinema_name' => 'Teeiv Phú Thọ',
            'slug' => 'teeiv-phu-tho',
            'address' => '122 Lê Đại Hành, Lâm Thao, Phú Thọ',
            'phone' => '0326107502',
        ]);
    }
}
