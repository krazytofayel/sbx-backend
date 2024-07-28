<?php

namespace App\Filament\Resources\ConfirmTransactionResource\Pages;

use App\Filament\Resources\ConfirmTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfirmTransaction extends EditRecord
{
    protected static string $resource = ConfirmTransactionResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }
}
