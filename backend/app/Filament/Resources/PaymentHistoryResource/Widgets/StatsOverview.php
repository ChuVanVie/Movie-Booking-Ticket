<?php

namespace App\Filament\Resources\PaymentHistoryResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\PaymentHistory;

class StatsOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.showtime-resource.widgets.stats-overview';
    protected function getCards(): array
    {
        $totalPayments = PaymentHistory::all()->count();
        $paymentsThisMonth = PaymentHistory::whereBetween('payment_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

        $totalAmoutThisMonth = PaymentHistory::whereBetween('payment_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amout');
        $totalAmoutPreviousMonth = PaymentHistory::whereBetween('payment_date', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->sum('amout');

        $percentageChange = round(($totalAmoutThisMonth - $totalAmoutPreviousMonth) / ($totalAmoutPreviousMonth ?: 1) * 100);

        //The most used payment method
        $mostUsedMethod = PaymentHistory::select('payment_method', DB::raw('COUNT(*) as method_count'))
            ->groupBy('payment_method')
            ->orderByDesc('method_count')
            ->first();

        return [
            Card::make('Total Payment', $totalPayments),
            Card::make('Transactions occurred this month', $paymentsThisMonth),
            Card::make('Total amout paid this month', $totalAmoutThisMonth . 'VNĐ')
                ->description( $percentageChange > 0 ? ($percentageChange . '% increase') : (-$percentageChange . '% decrease'))
                ->descriptionIcon($percentageChange > 0 ? 'heroicon-s-trending-up' : 'heroicon-s-trending-down')
                ->color($percentageChange > 0 ? 'success' : 'danger'),
            Card::make('The most used payment method', $mostUsedMethod->payment_method ?? 'No data'),
        ];
    }
}
