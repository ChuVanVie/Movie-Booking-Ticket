<?php

namespace App\Filament\Resources\ReservationResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShowtimeRelationManager extends RelationManager
{
    protected static string $relationship = 'showtime';

    protected static ?string $recordTitleAttribute = 'showtime_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('movie.movie_name'),
                ImageColumn::make('movie.thumb_url')
                    ->label('Thumbnail')
                    ->width(80)
                    ->height(80),
                TextColumn::make('cinema.cinema_name'),
                TextColumn::make('theater.theater_name'),
                TextColumn::make('start_time')->dateTime(),
                TextColumn::make('end_time')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
