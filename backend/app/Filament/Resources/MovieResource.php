<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\MovieResource\RelationManagers;
use App\Models\Movie;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\FileUpload;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Closure;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovieResource extends Resource
{
    protected static ?string $model = Movie::class;
    
    protected static ?string $recordTitleAttribute = 'movie_name';
    
    protected static ?string $navigationIcon = 'heroicon-o-film';
    
    protected static ?string $navigationGroup = 'Movie Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Movie')
                        ->schema([
                            TextInput::make('movie_name')
                                ->autofocus()
                                ->reactive()
                                ->afterStateUpdated(function (Closure $set, $state){
                                    $set('slug', Str::slug($state));
                                })
                                ->required(),
                            TextInput::make('slug')->disabled()->required(),
                            BelongsToSelect::make('category_id')
                                ->relationship('categories', 'category_name')
                                ->searchable()
                                ->preload()
                                ->multiple()
                                ->required(),
                            BelongsToSelect::make('country_id')
                                ->relationship('country', 'country_name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            TextInput::make('duration')
                                ->maxLength(100)
                                ->required(),
                            TextInput::make('year')
                                ->numeric()
                                ->required(),
                            Textarea::make('desc')
                                ->columnSpan('full')
                                ->required(),
                            FileUpload::make('thumb_url'),
                            FileUpload::make('poster_url'),
                            FileUpload::make('trailer_url'),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('movie_name')->searchable(),
                ImageColumn::make('thumb_url')
                    ->width(80)
                    ->height(80),
                // TextColumn::make('thumb_url')->limit(30),
                TextColumn::make('country.country_name'),
                TextColumn::make('categories.category_name'),
                TextColumn::make('duration')->sortable(),
                TextColumn::make('year')->sortable(),
                TextColumn::make('desc')->limit(50),
                TextColumn::make('rating')->sortable(),
                ImageColumn::make('poster_url')
                    ->width(80)
                    ->height(80),
                TextColumn::make('trailer_url'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('Category')
                    ->relationship('categories', 'category_name')
                    ->multiple(),
                SelectFilter::make('Country')
                    ->relationship('country', 'country_name'),
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
            RelationManagers\RatesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'edit' => Pages\EditMovie::route('/{record}/edit'),
        ];
    }    
}
