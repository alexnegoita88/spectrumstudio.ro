<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactFormSubmissionsResource\Pages;
use App\Filament\Resources\ContactFormSubmissionsResource\RelationManagers;
use App\Models\FormSubmission;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactFormSubmissionsResource extends Resource
{
    protected static ?string $model = FormSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';


    protected static ?string $navigationGroup = 'Management';

    public static function getNavigationBadge(): ?string
    {
        $nrOfRecords = static::$model::where('seen' , 0)->count();
        if ($nrOfRecords > 0) {
            return $nrOfRecords . ' New';
        }
        return null;
    }

    public static function getNavigationBadgeColor(): string | array | null
    {
        return Color::Purple;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make([
                        
                        Section::make('name')
                            ->heading('Name')
                            ->description('This is the name that the user provided')
                            ->schema([
                                
                                TextInput::make('name')
                                ->hiddenLabel()
                                ->disabled()
                                ->columnSpanFull(),
                            ]),    


                        Section::make('email')
                            ->heading('Email')
                            ->description('This is the email that the user provided')
                            ->schema([
                                
                                TextInput::make('email')
                                ->hiddenLabel()
                                ->disabled()
                                ->columnSpanFull(),
                            ])
                            ->footerActions([
                                Action::make('Raspunde prin email')
                                ->url(function (FormSubmission $formSubmission) {
                            
                                    $subject = 'SpectrumStudio - Raspuns la solicitarea din formularul de contact';
                                    $body = "Ca urmare a completarii formularului de contact din website-ul nostru va transmitem urmatoarele:";
                                    
                                    $mailtoLink = "mailto:alex@paradise-agency.ro?subject={$subject}&body={$body}";
                            
                                    return $mailtoLink;
                                })
                                ->color(Color::Purple)
                                ->link()
                                ->openUrlInNewTab()
                            ]),               
                        

                        Section::make('message')
                            ->heading('Email')
                            ->description('This is the message that the user provided')
                            ->schema([
                                
                                RichEditor::make('message')
                                    ->disabled(),
                            ])
                        ,

                    ]),
                ])->columns(2)->columnSpan(2),
                Group::make()->schema([
                    Section::make([
                        Section::make('referrer')
                            ->heading('URL')
                            ->description('This is the location where the submission came from')
                            ->schema([
                                
                                TextInput::make('referrer')
                                ->formatStateUsing(fn ($state) => env('APP_URL') ."/". $state)
                                ->hiddenLabel()
                                ->disabled()
                                ->columnSpanFull(),
                            ])
                            ->footerActions([
                                Action::make('Vezi pagina sursa')
                                ->livewireTarget('blank')
                                ->url(function (FormSubmission $formSubmission) {
                                    return env('APP_URL') ."/".$formSubmission->referrer;
                                    
                                })
                                ->color(Color::Purple)
                                ->link()
                                ->openUrlInNewTab()
                            ]),
                        Toggle::make('seen')
                            ->default(function ($get) {
                                return $get('active') != 0;
                            })
                            ->label(function ($state, $get) {
                                // $state represents the current value of the 'seen' field
                                return $get('seen') == 1 ? 'Seen' : 'New';
                            })
                            ->disabled()
                            ,

                        DateTimePicker::make('created_at')
                            ->readOnly(),
                        DateTimePicker::make('updated_at')
                            ->readOnly(),
                    ])->heading("Meta")
                ])->columns(1)->columnSpan(1)

            ])       ->columns(3)    
            ;

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggledHiddenByDefault()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('name')
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('email')
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('message')
                    ->toggleable()
                    ->searchable()
                    ->limit(20),
                BadgeColumn::make('active')
                    ->getStateUsing(function (FormSubmission $formSubmission) {
                        return $formSubmission->seen == 1 ? "Seen" : "New";
                    })
                    ->sortable()
                    ->color(fn ($state) => match($state) {
                        'Seen' => 'gray',
                        'New' => 'danger',
                    })
                    ->toggleable()
                    ->label('Status'),

                TextColumn::make('referrer')
                    ->toggleable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => env('APP_URL') .'/'. $state),
                


            ])->defaultSort('id', 'desc')

            ->filters([
                SelectFilter::make('seen')
                    ->label('Status')
                    ->options([
                        '1' => 'Seen',
                        '0' => 'New',
                    ]),            ])
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactFormSubmissions::route('/'),
            'create' => Pages\CreateContactFormSubmissions::route('/create'),
            'edit' => Pages\EditContactFormSubmissions::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
       return false;
    }
    public static function canDelete($lead): bool
    {
        return false;
    }

}
