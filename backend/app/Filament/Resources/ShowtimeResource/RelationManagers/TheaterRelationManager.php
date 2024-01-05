<?php

namespace App\Filament\Resources\ShowtimeResource\RelationManagers;

use App\Models\Theater;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Tables\Columns\TextColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TheaterRelationManager extends RelationManager
{
    protected static string $relationship = 'theater';

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
                TextColumn::make('id'),
                TextColumn::make('theater_name'),
                TextColumn::make('capacity'),
                TextColumn::make('status')
                    ->getStateUsing(static function (Theater $record): string {
                        return config('constants.THEATER_STATUS_NAME')[$record->status];
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->headerActions([

            ])
            ->actions([

            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
