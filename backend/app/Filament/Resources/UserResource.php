<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

use Livewire\TemporaryUploadedFile;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\User;
use Closure;
use Exception;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    // protected static ?string $navigationLabel = 'User';

    // protected static ?string $modelLabel = 'User';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Section::make('User')
                        ->description('User infomation')
                        ->schema([
                            TextInput::make('name')
                                ->autofocus()
                                ->required()
                                ->placeholder('Name')
                                ->reactive()
                                ->afterStateUpdated(static function (Closure $set, $state) {
                                    dd($state);
                                })
                                ->disabled(static function (User $record): bool {
                                    if ($record->role == config('constant.ROLE.ADMIN')) {
                                        return false;
                                    }
                                    return true;
                                }),
                            TextInput::make('email')
                                ->required()
                                ->placeholder('Email')
                                ->email()
                                ->unique(table: User::class)
                                ->disabled(static function (User $record): bool {
                                    if ($record->role == config('constant.ROLE.ADMIN')) {
                                        return false;
                                    }
                                    return true;
                                }),
                            // TextInput::make('password')
                            //     ->required()
                            //     ->placeholder('Password')
                            //     ->password()
                            //     ->hiddenOn('edit'),
                            Select::make('role')
                                ->options([
                                    0 => 'ADMIN',
                                    1 => 'USER'
                                ])
                                ->required(),
                            DatePicker::make('dob'),
                            TextInput::make('phone')
                                ->tel()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                            TextInput::make('address')->maxLength(256),
                        ])->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('role')
                    ->getStateUsing(static function (User $record): string {
                        return config('constants.ROLE_NAME')[$record->role];
                    }),
                TextColumn::make('dob')->dateTime()->sortable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('address')->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        0 => 'Admin',
                        1 => 'User',
                    ]),
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

        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
