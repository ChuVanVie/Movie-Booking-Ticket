<?php

namespace App\Filament\Resources\ShowtimeResource\Pages;

use App\Filament\Resources\ShowtimeResource;
use App\Filament\Resources\ShowtimeResource\Widgets\StatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShowtimes extends ListRecords
{
    protected static string $resource = ShowtimeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
