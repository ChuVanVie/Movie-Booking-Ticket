<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\PaymentHistory;

class PaymentHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentHistory::create([
            'reservation_id' => 1,
            'payment_date' => Carbon::createFromFormat('d/m/Y', '08/12/2023'),
            'payment_method' => 'Momo',
            'amout' => 160000
        ]);

        PaymentHistory::create([
            'reservation_id' => 2,
            'payment_date' => Carbon::createFromFormat('d/m/Y', '10/12/2023'),
            'payment_method' => 'Banking',
            'amout' => 240000
        ]);

        PaymentHistory::create([
            'reservation_id' => 3,
            'payment_date' => Carbon::createFromFormat('d/m/Y', '10/12/2023'),
            'payment_method' => 'Banking',
            'amout' => 60000
        ]);

        PaymentHistory::create([
            'reservation_id' => 4,
            'payment_date' => Carbon::createFromFormat('d/m/Y', '09/12/2023'),
            'payment_method' => 'Momo',
            'amout' => 160000
        ]);

        PaymentHistory::create([
            'reservation_id' => 5,
            'payment_date' => Carbon::createFromFormat('d/m/Y', '06/12/2023'),
            'payment_method' => 'Visa',
            'amout' => 160000
        ]);

        PaymentHistory::create([
            'reservation_id' => 6,
            'payment_date' => Carbon::createFromFormat('d/m/Y', '06/12/2023'),
            'payment_method' => 'Momo',
            'amout' => 120000
        ]);

        PaymentHistory::create([
            'reservation_id' => 7,
            'payment_date' => Carbon::createFromFormat('d/m/Y', '09/12/2023'),
            'payment_method' => 'Banking',
            'amout' => 120000
        ]);
    }
}
