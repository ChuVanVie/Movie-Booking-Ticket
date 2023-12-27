<?php

namespace App\Filament\Resources\PaymentHistoryResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

use App\Models\PaymentHistory;

class StatsOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.showtime-resource.widgets.stats-overview';
    protected function getCards(): array
    {
        return [
            Card::make('Total Payment', PaymentHistory::all()->count())
                ->description('10% increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Total amout', PaymentHistory::sum('amout') . ' VNĐ')
                ->description('7% increase')
                ->descriptionIcon('heroicon-s-trending-down')
                ->color('danger'),
            Card::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('warning'),
        ];
    }
}
