<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Auth;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        $userIdBeingEdited = request()->route('record');
        $isCreating = request()->routeIs('filament.resources.users.create');
        $isEditingSelf = Auth::check() && Auth::id() === (int) $userIdBeingEdited;

        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2)
                    ->autocomplete(fn() => false)
                    ->extraAttributes(['class' => 'w-1/2']),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2)
                    ->autocomplete(fn() => false)
                    ->extraAttributes(['class' => 'w-1/2']),

                TextInput::make('password')
                    ->password()
                    ->minLength(6)
                    ->required(fn () => $isCreating) // Only required on create
                    ->hidden(fn () => !$isCreating && !$isEditingSelf) // Hidden unless creating, editing own profile
                    ->dehydrated(fn ($state) => filled($state)) // Ensure it's processed only if filled
                    ->columnSpan(2)
                    ->autocomplete(false)
                    ->extraAttributes(['class' => 'w-1/2']),

            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->date(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('name'),
            TextEntry::make('email'),
            TextEntry::make('created_at'),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
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
