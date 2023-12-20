<?php

namespace App\Filament\Resources\CinemaResource\Pages;

use App\Filament\Resources\CinemaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCinema extends CreateRecord
{
    protected static string $resource = CinemaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
