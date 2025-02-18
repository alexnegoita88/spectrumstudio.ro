<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeaderSliderResource\Pages;
use App\Filament\Resources\HeaderSliderResource\RelationManagers;
use App\Models\HeaderSlider;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeaderSliderResource extends Resource
{
    protected static ?string $model = HeaderSlider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Content';

    public static function getNavigationLabel(): string
    {
        return 'Header slider'; // Înlocuiește cu textul dorit
    }

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Create a blog post')->schema([

                        TextInput::make('h1_title')
                            ->label('Extra large title')
                            ->hint('The biggest title of the slider')
                            ->columnSpanFull()
                            ->maxLength(80)
                    ,
                        TextInput::make('h2_title')
                            ->label('Large title')
                            ->hint('Title of the slider')
                            ->columnSpanFull()
                            ->maxLength(80)
                    ,
                        TextInput::make('subtitle')
                            ->label('Subtitle')
                            ->hint('A subtitle')
                            ->columnSpanFull()
                            ->maxLength(160)
                    ,
                        TextInput::make('cta_link')
                            ->label('A link for this call to action button')
                            ->hint('Call to action link (url)')
                            ->columnSpanFull()
                            ->maxLength(255)
                            ->url()
                            ->placeholder("https://www.spectrumstudio.ro/product/product-5")
                            ,
                            
                        TextInput::make('cta_name')
                            ->maxLength(16)
                            ->label('Button text')
                            ->hint('Call to action button name (max: 16 characters)')
                            ->columnSpanFull()
                            ->placeholder("Something stupid like i love you")
                    ,
    

                    ])
                ])->columns(2)->columnSpan(2),

                Group::make()->schema([
                    Section::make('Meta')->schema([
                        Select::make('effect')
                            ->name('effect')
                            ->label('Effect')
                            ->hint('Animiation slides behaviour')
                            ->default('slide')
                            ->options([
                                'slide' =>'Slide',
                                'fade' =>'Fade',
                                'cube' =>'Cube',
                                'coverflow' =>'Coverflow',
                                'flip' =>'Flip',
                                'creative' =>'Creative',
                                'cards' =>'Cards',
                            ])
                            ->disablePlaceholderSelection()


                        ,


                        FileUpload::make('images')
                            ->label('Slider images')
                            ->hint('Maximum of 5 pictures')
                            ->image()

                            ->enableReordering()
                            ->required()
                            ->multiple()
                            ->maxFiles(5) 
                            ->preserveFilenames()
                            ->downloadable()
                            ->openable()
                            ->imageEditor()

                            // ->minSize(512)
                            // ->maxSize(2048)

                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                        
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                        
                        
                            ->imageEditorAspectRatios(['4:3', '16:9', '1:1'])
                            ->disk('uploads') // Specificăm disk-ul personalizat
                            ->directory('header_slider')
                            ->visibility('public')
                            ->columnSpanFull()
                        ,

                    ])
                ])->columns(1),
                

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
        
            ->columns([
                TextColumn::make('id')
                ->toggleable(true)
                ->toggledHiddenByDefault()
                ->sortable()
                ,

                ImageColumn::make('pictures')
                    ->disk('uploads') // Specificăm disk-ul personalizat
                    // ->directory('header_slider')
                    ->visibility('public')

                    ->getStateUsing(function (HeaderSlider $record) {
                        // Directly access the first element of the array
                        return is_array($record->images) ? $record->images[0] : null;
                    })
                    ->toggleable(true)
                ,


                TextColumn::make('num_images')
                    ->label('image count')
                    ->getStateUsing(function (HeaderSlider $record) {
                        return is_array($record->images) ? count($record->images) : 0;
                    })
                ,
                
                TextColumn::make('h1_title')
                    ->limit(80)
                    ->toggleable(true)
                    ->searchable()
                    ->sortable()
                ,
                TextColumn::make('h2_title')
                    ->limit(80)
                    ->toggleable(true)
                    ->searchable()
                    ->sortable()
                ,

                TextColumn::make('cta_name')
                    ->limit(16)
                    ->toggleable(true)
                    ->searchable()
                    ->sortable()
                ,


                ToggleColumn::make('is_active')
                    ->label('Activ')
                    ->sortable()
                    ->afterStateUpdated(function ($record, $state) {
                        if ($state) {
                            // Dezactivează toate celelalte înregistrări
                            $record->newQuery()->where('id', '!=', $record->id)->update(['is_active' => false]);
                        }
                
                        // Actualizează înregistrarea curentă
                        $record->update(['is_active' => $state]);
                    }),
            

                    
                BadgeColumn::make('active')
                    ->getStateUsing(function (HeaderSlider $record) {
                        return $record->is_active == 1 ? "Active" : "Inactive";
                    })
                    ->sortable()
                    ->color(fn ($state) => match($state) {
                        'Active' => 'success',
                        'Inactive' => 'danger',
                    })
                    ->toggleable()
                    ->label('Status')
                    ->toggledHiddenByDefault()
                ,


            ])
            ->defaultSort('id', 'desc')

            ->filters([
                // Status Filter
                SelectFilter::make('is_active')
                ->label('Status')
                ->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
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
            'index' => Pages\ListHeaderSliders::route('/'),
            'create' => Pages\CreateHeaderSlider::route('/create'),
            'edit' => Pages\EditHeaderSlider::route('/{record}/edit'),
        ];
    }
}
