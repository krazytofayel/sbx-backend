<?php

namespace App\Filament\Resources\SenderInformationResource\Pages;

use App\Filament\Resources\SenderInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSenderInformation extends EditRecord
{
    protected static string $resource = SenderInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
