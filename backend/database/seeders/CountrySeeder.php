<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'country_name' => 'Hàn Quốc',
        ]);

        Country::create([
            'country_name' => 'Trung Quốc',
        ]);

        Country::create([
            'country_name' => 'Canada',
        ]);

        Country::create([
            'country_name' => 'Âu Mỹ',
        ]);

        Country::create([
            'country_name' => 'Thổ Nhĩ Kỳ',
        ]);

        Country::create([
            'country_name' => 'Việt Nam',
        ]);

        Country::create([
            'country_name' => 'Nhật Bản',
        ]);
    }
}
