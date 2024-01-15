<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeatResource\Pages;
use App\Filament\Resources\SeatResource\RelationManagers;
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

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeatResource extends Resource
{
    protected static ?string $model = Seat::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    
    protected static ?string $navigationGroup = 'Cinema Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Seat')
                        ->schema([
                            BelongsToSelect::make('theater_id')
                                ->relationship('theater', 'theater_name')
                                ->required()
                                ->disabledOn('edit'),
                            TextInput::make('seat_number')->maxLength(255)->required(),
                            Select::make('status')
                                ->options([
                                    'Available' => 'Available',
                                    'Not Available' => 'Not Available',
                                    'Reserved' => 'Reserved',
                                ])
                                ->required(),
                            TextInput::make('price')->numeric()->required(),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('theater.theater_name'),
                TextColumn::make('seat_number')->searchable()->alignment('center'),
                TextColumn::make('status'),
                TextColumn::make('price')->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')->dateTime()
            ])
            ->filters([
                SelectFilter::make('Theater')->relationship('theater', 'theater_name'),
                SelectFilter::make('Status')
                    ->options([
                        'Available' => 'Available',
                        'Reserved' => 'Reserved',
                    ])
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSeats::route('/'),
            'create' => Pages\CreateSeat::route('/create'),
            'edit' => Pages\EditSeat::route('/{record}/edit'),
        ];
    }    
}
