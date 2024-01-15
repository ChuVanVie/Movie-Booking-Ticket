<?php

namespace App\Filament\Resources\ShowtimeResource\RelationManagers;

use App\Models\Seat;
use App\Models\SeatStatus;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeatStatusesRelationManager extends RelationManager
{
    protected static string $relationship = 'seatStatuses';

    protected static ?string $recordTitleAttribute = 'showtime_id';

    protected static ?string $label = 'Status of Seats';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        $seatStatus = config('constants.SEAT_STATUS_NAME');
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('seat_id')
                    ->label('Seat number')
                    ->getStateUsing(static function (SeatStatus $record): string {
                        $seat = Seat::where('id', $record->seat_id)->first();
                        return $seat->seat_number;
                    })
                    ->searchable()
                    ->alignment('center'),
                TextColumn::make('status')
                    ->getStateUsing(static function (SeatStatus $record): string {
                        return config('constants.SEAT_STATUS_NAME')[$record->status];
                    }),
                BadgeColumn::make('status')
                    ->enum($seatStatus)
                    ->colors([
                        'success' => array_search($seatStatus[0], $seatStatus),
                        'warning' => array_search($seatStatus[1], $seatStatus),
                        'danger' => array_search($seatStatus[2], $seatStatus),
                    ])
                    ->alignment('center'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')->dateTime()
            ])
            ->filters([
                SelectFilter::make('Status')
                    ->options([
                        '0' => 'Available',
                        '1' => 'Unvailable',
                        '2' => 'Reserved',
                    ]),
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
