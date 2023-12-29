<?php

namespace App\Filament\Resources;

use App\Models\Reservation;
use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Seat;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\ReservationResource\Widgets\StatsOverview;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Ticket Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Reservation')
                        ->schema([
                            TextInput::make('ticket_code')->label('Ticket Code'),
                            TextInput::make('user_id')->label('User ID'),
                            TextInput::make('showtime_id')->label('Showtime ID'),
                            // TextInput::make('showtime_id')
                            //     ->label('Movie')
                            //     ->formatStateUsing(function($state, callable $get, callable $set){
                            //         $showtime = Showtime::where('id', $state)->with('movie')->first();
                            //         return $showtime->movie->movie_name;
                            //     }),
                            TextInput::make('seat_ids')
                                ->label('Seat Numbers')
                                ->formatStateUsing(function($state, callable $get, callable $set){
                                    $seat_ids = json_decode($state);
                                    $seat_numbers = [];
                                    foreach ($seat_ids as $seatId) {
                                        $seat = Seat::where('id', $seatId)->first();
                                        $seat_numbers[] = $seat->seat_number;
                                    }
                                    return $seat_numbers;
                                }),
                            TextInput::make('total_price')->label('Total Price'),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('ticket_code')->sortable()->searchable(),
                TextColumn::make('user.name')->searchable(),
                TextColumn::make('showtime.movie.movie_name'),
                TextColumn::make('showtime.cinema.cinema_name'),
                TextColumn::make('showtime.theater.theater_name'),
                TextColumn::make('seat_numbers')
                    ->label('Seat Number')
                    ->getStateUsing(function(Reservation $record){
                        $seat_ids = json_decode($record->seat_ids);
                        $seat_numbers = [];
                        foreach ($seat_ids as $seatId) {
                            $seat = Seat::where('id', $seatId)->first();
                            $seat_numbers[] = $seat->seat_number;
                        }
                        return $seat_numbers;
                    }),
                TextColumn::make('showtime.start_time')
                    ->label('Start Time')
                    ->dateTime(),
                TextColumn::make('showtime.end_time')
                    ->label('End Time')
                    ->dateTime(),
                TextColumn::make('total_price'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('User')->relationship('user', 'name'),
                // SelectFilter::make('Cinema')->relationship('showtime', 'cinema_id', function (Builder $query){
                //     dd($query->where('cinema_id'));
                // }),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until')->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\UserRelationManager::class,
            RelationManagers\ShowtimeRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'view' => Pages\ViewReservation::route('/{record}'),
        ];
    }
    
    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
