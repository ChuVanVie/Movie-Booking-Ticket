<?php

namespace App\Filament\Resources\TheaterResource\Pages;

use App\Filament\Resources\TheaterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTheaters extends ListRecords
{
    protected static string $resource = TheaterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
