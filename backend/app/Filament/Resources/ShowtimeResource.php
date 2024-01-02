<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShowtimeResource\Pages;
use App\Filament\Resources\ShowtimeResource\RelationManagers;

use App\Models\Showtime;
use App\Models\Theater;
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
use Filament\Forms\Components\DateTimePicker;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Closure;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\ShowtimeResource\Widgets\StatsOverview;

class ShowtimeResource extends Resource
{
    protected static ?string $model = Showtime::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    
    protected static ?string $navigationGroup = 'Ticket Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Showtimes')
                        ->schema([
                            BelongsToSelect::make('movie_id')
                                ->relationship('movie', 'movie_name')
                                ->required()
                                ->disabledOn('edit'),
                            Select::make('cinema_id')
                                ->relationship('cinema', 'cinema_name')
                                ->reactive()
                                ->required()
                                ->disabledOn('edit'),
                            Select::make('theater_id')
                                ->label('Theater')
                                ->options(fn (callable $get) => Theater::query()
                                    ->where('cinema_id', $get('cinema_id'))
                                    ->pluck('theater_name', 'id'))
                                ->required()
                                ->disabledOn('edit'),
                            DateTimePicker::make('start_time')->required(),
                            DateTimePicker::make('end_time')->required(),
                            Select::make('status')
                                ->options([
                                    '0' => 'NOW SHOWING',
                                    '1' => 'UPCOMING',
                                    '2' => 'CANCELLED',
                                ])
                                ->required(),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        $showtimeStatus = config('constants.SHOWTIME_STATUS_NAME');
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('movie.movie_name')->searchable(),
                TextColumn::make('cinema.cinema_name'),
                TextColumn::make('theater.theater_name'),
                TextColumn::make('start_time')->dateTime()->sortable(),
                TextColumn::make('end_time')->dateTime()->sortable(),
                BadgeColumn::make('status')
                    ->enum($showtimeStatus)
                    ->colors([
                        'success' => array_search($showtimeStatus[0], $showtimeStatus),
                        'warning' => array_search($showtimeStatus[1], $showtimeStatus),
                        'danger' => array_search($showtimeStatus[2], $showtimeStatus),
                    ])
                    ->alignment('center'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('Movie')->relationship('movie', 'movie_name'),
                SelectFilter::make('Cinema')->relationship('cinema', 'cinema_name'),
                SelectFilter::make('Status')
                    ->options([
                        '0' => 'NOW SHOWING',
                        '1' => 'UPCOMING',
                        '2' => 'CANCELLED',
                    ]),
                Filter::make('Duration')
                    ->form([
                        DateTimePicker::make('time_from')->default(now()),
                        DateTimePicker::make('time_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['time_from'],
                                fn (Builder $query, $date): Builder => $query->whereTime('start_time', '>=', $date),
                            )
                            ->when(
                                $data['time_until'],
                                fn (Builder $query, $date): Builder => $query->whereTime('end_time', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListShowtimes::route('/'),
            'create' => Pages\CreateShowtime::route('/create'),
            'edit' => Pages\EditShowtime::route('/{record}/edit'),
        ];
    } 
    
    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
