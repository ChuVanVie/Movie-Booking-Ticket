<?php

namespace App\Filament\Resources\MovieResource\RelationManagers;

use App\Models\Rate;
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
use Filament\Forms\Components\DatePicker;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RatesRelationManager extends RelationManager
{
    protected static string $relationship = 'rates';

    protected static ?string $recordTitleAttribute = 'movie_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('Rate')
                        ->schema([
                            BelongsToSelect::make('user_id')
                                ->relationship('user', 'name')
                                ->required(),
                            TextInput::make('star')->required(),
                            TextInput::make('comment')->required(),
                            DatePicker::make('created_at')->required(),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('user.name')->searchable(),
                TextColumn::make('star')
                    ->sortable()
                    ->getStateUsing(function (Rate $record){
                        $star = $record->star;
                        return $star . '/10';
                    }),
                TextColumn::make('comment'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
