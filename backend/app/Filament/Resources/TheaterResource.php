<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TheaterResource\Pages;
use App\Filament\Resources\TheaterResource\RelationManagers;
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

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TheaterResource extends Resource
{
    protected static ?string $model = Theater::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    
    protected static ?string $navigationGroup = 'Cinema Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Theater')
                        ->schema([
                            BelongsToSelect::make('cinema_id')
                                ->relationship('cinema', 'cinema_name')
                                ->required()
                                ->disabledOn('edit'),
                            TextInput::make('theater_name')->maxLength(255)->required(),
                            TextInput::make('capacity')->numeric()->required(),
                            Select::make('status')
                                ->options([
                                    'Available' => 'Available',
                                    'In Use' => 'In Use',
                                ])
                                ->required()
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('theater_name')->searchable(),
                TextColumn::make('cinema.cinema_name'),
                TextColumn::make('capacity'),
                TextColumn::make('status'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')->dateTime()
            ])
            ->filters([
                //
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
            'index' => Pages\ListTheaters::route('/'),
            'create' => Pages\CreateTheater::route('/create'),
            'edit' => Pages\EditTheater::route('/{record}/edit'),
        ];
    }    
}
