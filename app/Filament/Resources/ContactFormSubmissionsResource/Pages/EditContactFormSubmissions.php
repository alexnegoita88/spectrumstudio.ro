<?php

namespace App\Filament\Resources\ContactFormSubmissionsResource\Pages;

use App\Filament\Resources\ContactFormSubmissionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactFormSubmissions extends EditRecord
{
    protected static string $resource = ContactFormSubmissionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->authorizeAccess();

        
        $this->previousUrl = url()->previous();
        
        $this->record->seen = 1;
        $this->record->save();

        $this->fillForm();
    }
}
