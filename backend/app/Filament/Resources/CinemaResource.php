<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CinemaResource\Pages;
use App\Filament\Resources\CinemaResource\RelationManagers;
use App\Models\Cinema;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Closure;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CinemaResource extends Resource
{
    protected static ?string $model = Cinema::class;

    protected static ?string $recordTitleAttribute = 'cinema_name';
    
    protected static ?string $navigationIcon = 'heroicon-o-map';
    
    protected static ?string $navigationGroup = 'Cinema Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Cinema')
                        ->schema([
                            TextInput::make('cinema_name')
                                ->reactive()
                                ->afterStateUpdated(function (Closure $set, $state){
                                    $set('slug', Str::slug($state));
                                })
                                ->required(),
                            TextInput::make('slug')->required(),
                            TextInput::make('address')->maxLength(255)->required(),
                            TextInput::make('phone')
                                ->tel()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                ->required(),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('cinema_name')->searchable(),
                TextColumn::make('address'),
                TextColumn::make('phone'),
                TextColumn::make('theaters_count')->counts('theaters')->sortable()->alignment('center'),
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
            RelationManagers\TheatersRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCinemas::route('/'),
            'create' => Pages\CreateCinema::route('/create'),
            'edit' => Pages\EditCinema::route('/{record}/edit'),
        ];
    }    
}
