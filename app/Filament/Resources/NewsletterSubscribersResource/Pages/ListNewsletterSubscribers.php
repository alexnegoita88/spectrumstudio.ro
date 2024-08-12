<?php

namespace App\Filament\Resources\NewsletterSubscribersResource\Pages;

use App\Filament\Resources\NewsletterSubscribersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsletterSubscribers extends ListRecords
{
    protected static string $resource = NewsletterSubscribersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
