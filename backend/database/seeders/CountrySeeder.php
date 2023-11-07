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
            'slug' => 'han-quoc'
        ]);

        Country::create([
            'country_name' => 'Trung Quốc',
            'slug' => 'trung-quoc'
        ]);

        Country::create([
            'country_name' => 'Canada',
            'slug' => 'canada'
        ]);

        Country::create([
            'country_name' => 'Âu Mỹ',
            'slug' => 'au-my'
        ]);

        Country::create([
            'country_name' => 'Thổ Nhĩ Kỳ',
            'slug' => 'tho-nhi-ky'
        ]);

        Country::create([
            'country_name' => 'Việt Nam',
            'slug' => 'viet-nam'
        ]);

        Country::create([
            'country_name' => 'Nhật Bản',
            'slug' => 'nhat-ban'
        ]);
    }
}
