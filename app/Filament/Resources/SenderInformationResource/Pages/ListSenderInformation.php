<?php

namespace App\Filament\Resources\SenderInformationResource\Pages;

use App\Filament\Resources\SenderInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSenderInformation extends ListRecords
{
    protected static string $resource = SenderInformationResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
