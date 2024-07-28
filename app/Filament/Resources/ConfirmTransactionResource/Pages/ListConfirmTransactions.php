<?php

namespace App\Filament\Resources\ConfirmTransactionResource\Pages;

use App\Filament\Resources\ConfirmTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfirmTransactions extends ListRecords
{
    protected static string $resource = ConfirmTransactionResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
