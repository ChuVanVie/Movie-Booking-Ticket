<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentHistoryResource\Pages;
use App\Filament\Resources\PaymentHistoryResource\RelationManagers;
use App\Filament\Resources\PaymentHistoryResource\Widgets\StatsOverview;
use App\Models\PaymentHistory;
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

class PaymentHistoryResource extends Resource
{
    protected static ?string $model = PaymentHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Ticket Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Payment')
                        ->schema([
                            TextInput::make('reservation_id')->required(),
                            TextInput::make('payment_date')->required(),
                            TextInput::make('payment_method')->required(),
                            TextInput::make('amout')->required(),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('reservation.user.name')->searchable(),
                TextColumn::make('reservation.ticket_code')->label('Ticket Code'),
                TextColumn::make('payment_method'),
                TextColumn::make('payment_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('amout')->sortable(),
            ])
            ->filters([
                SelectFilter::make('payment_method')
                    ->options([
                        'Momo' => 'Momo',
                        'Banking' => 'Banking',
                        'Visa' => 'Visa',
                    ]),
                Filter::make('payment_date')
                    ->form([
                        DatePicker::make('payment_from'),
                        DatePicker::make('payment_until')->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['payment_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('payment_date', '>=', $date),
                            )
                            ->when(
                                $data['payment_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('payment_date', '<=', $date),
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
            'index' => Pages\ListPaymentHistories::route('/'),
            'view' => Pages\ViewPaymentHistory::route('/{record}'),
        ];
    }
    
    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
