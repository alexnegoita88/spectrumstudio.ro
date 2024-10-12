<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterSubscribersResource\Pages;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Forms\Components\Group;


class NewsletterSubscribersResource extends Resource
{
    protected static ?string $model = NewsletterSubscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Add a new email subscriber')->schema([
                        TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->unique(ignoreRecord:true)
                        ->columnSpanFull()
                        ->required()
                        ->maxLength(255)
                    ,
                    Toggle::make('active')
                        ->label('Subscribed')
                        ->required()
                        ->columnSpanFull()
                        ->default(true),

                    ])
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable(true)
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('email')
                    ->toggleable(true)
                    ->sortable(),
                BadgeColumn::make('active')
                    ->getStateUsing(function (NewsletterSubscriber $newsletterSubscriber) {
                        return $newsletterSubscriber->active == 1 ? "Active" : "Inactive";
                    })
                    ->sortable()
                    ->color(fn ($state) => match($state) {
                        'Active' => 'success',
                        'Inactive' => 'danger',
                    })
                    ->toggleable()
                    ->label('Status'),
                TextColumn::make('created_at')
                    ->toggleable(true)
                    ->sortable()
                    ->label('Subscribed at'),
                TextColumn::make('updated_at')
                    ->toggleable(true)
                    ->sortable()
                    ->label('Updated at'),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('active')
                    ->label('Status')
                    ->options([
                        '1' => 'Subscribed',
                        '0' => 'Unsubscribed',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()
                ->exports([
                    ExcelExport::make()->withColumns([
                        Column::make('id')->heading('Id'),
                        Column::make('email')->heading('Email'),
                        Column::make('active')
                            ->heading('Status')
                            ->formatStateUsing(function (NewsletterSubscriber $newsletterSubscriber) {
                                return intval($newsletterSubscriber->subscribed) == 1 ? "Inactiv" : "Activ";
                            })
                        ,
                        Column::make('created_at')->heading('Creat la'),
                        Column::make('updated_at')->heading('Actualizat la'),
                    ])       
                    ->askForFilename()
                    ->askForWriterType()
                    ->withFilename(fn ($filename) => 'EmailSubscribers-SpectrumStudio-' . $filename . ' - ' . date('d-M-Y_H:i:s'))
                ])
                ->label('Exporta (xlsx)')    
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
            'index' => Pages\ListNewsletterSubscribers::route('/'),
            'create' => Pages\CreateNewsletterSubscribers::route('/create'),
            'edit' => Pages\EditNewsletterSubscribers::route('/{record}/edit'),
        ];
    }
}
