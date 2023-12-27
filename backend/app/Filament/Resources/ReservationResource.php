<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use App\Models\Seat;
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
                    Section::make('Theater')
                        ->schema([
                            TextInput::make('ticket_code')->required(),
                            BelongsToSelect::make('user_id')
                                ->relationship('user', 'name')
                                ->required()
                                ->disabledOn('edit'),
                            // TextInput::make('showtime_id')
                            //     ->label('Movie')
                            //     ->formatStateUsing(function($state, callable $get, callable $set){
                            //         dd($get);
                            //     }),

                            // BelongsToSelect::make('showtime_id')
                            //     ->relationship('showtime.theater', 'theater_name')
                            //     ->required()
                            //     ->disabledOn('edit'),
                            TextInput::make('seat_ids')->required(),
                            TextInput::make('total_price')->required(),
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
                TextColumn::make('total_price'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('User')->relationship('user', 'name'),
                // SelectFilter::make('Cinema')->relationship('showtime', 'showtime.cinema_name'),
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            // 'create' => Pages\CreateReservation::route('/create'),
            // 'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
    
    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
