<?php

namespace App\Filament\Resources\CinemaResource\RelationManagers;

use App\Models\Cinema;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\BelongsToSelect;

use Filament\Tables\Columns\TextColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TheatersRelationManager extends RelationManager
{
    protected static string $relationship = 'theaters';

    protected static ?string $recordTitleAttribute = 'cinema_id';
    
    protected static ?string $label = 'Theater';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Theater')
                    ->schema([
                        BelongsToSelect::make('cinema_id')
                            ->relationship('cinema', 'cinema_name')
                            // ->default(function($state, callable $get, callable $set){
                            //         dd($state);
                            //     })
                            // ->formatStateUsing(function($state, callable $get, callable $set){
                            //     dd($get($recordTitleAttribute));
                            // })
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('theater_name')->searchable(),
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
