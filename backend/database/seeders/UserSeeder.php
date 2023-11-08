<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => config('constants.ROLE.ADMIN'),
        ]);

        User::create([
            'name' => 'Chu Văn Việt',
            'email' => 'vietcv@mail.com',
            'password' => bcrypt('12345678'),
            'role' => config('constants.ROLE.USER'),
            'dob' => Carbon::createFromFormat('d/m/Y', '03/07/2002'),
            'phone' => '0778277765',
            'address' => 'Kim Liên, ĐỐng đa, Hà Nội',
        ]);

        User::create([
            'name' => 'Hiephiep',
            'email' => 'hiepnd@mail.com',
            'password' => bcrypt('12345678'),
            'role' => config('constants.ROLE.USER'),
            'dob' => Carbon::createFromFormat('d/m/Y', '02/03/2002'),
            'phone' => '0987167265',
            'address' => 'Thảo Nhi, Đống Đa, Hà Nội'
        ]);

        User::create([
            'name' => 'CCC',
            'email' => 'chiennv@mail.com',
            'password' => bcrypt('12345678'),
            'role' => config('constants.ROLE.USER'),
            'dob' => Carbon::createFromFormat('d/m/Y', '03/04/2002'),
            'phone' => '097727265',
            'address' => 'Thanh Mai, Đống đa, Hà Nội'
        ]);

        User::create([
            'name' => 'Trần Hồng Quý',
            'email' => 'quyth@mail.com',
            'password' => bcrypt('12345678'),
            'role' => config('constants.ROLE.USER'),
            'dob' => Carbon::createFromFormat('d/m/Y', '12/12/2002'),
            'phone' => '094427265',
            'address' => 'Thanh Thảo, Đống đa, Hà Nội'
        ]);

        User::create([
            'name' => 'Lee Ngọc Hoa',
            'email' => 'hoahoa@mail.com',
            'password' => bcrypt('12345678'),
            'role' => config('constants.ROLE.USER'),
            'dob' => Carbon::createFromFormat('d/m/Y', '07/11/2002'),
            'phone' => '090227265',
            'address' => 'Trường Chinh, Thanh Xuân, Hà Nội'
        ]);
    }
}
