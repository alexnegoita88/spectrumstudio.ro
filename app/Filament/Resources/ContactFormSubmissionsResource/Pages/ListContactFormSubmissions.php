<?php

namespace App\Filament\Resources\ContactFormSubmissionsResource\Pages;

use App\Filament\Resources\ContactFormSubmissionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactFormSubmissions extends ListRecords
{
    protected static string $resource = ContactFormSubmissionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
