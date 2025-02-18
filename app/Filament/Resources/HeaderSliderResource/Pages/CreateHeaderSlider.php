<?php

namespace App\Filament\Resources\HeaderSliderResource\Pages;

use App\Filament\Resources\HeaderSliderResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;

class CreateHeaderSlider extends CreateRecord
{
    protected static string $resource = HeaderSliderResource::class;



    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }



}
