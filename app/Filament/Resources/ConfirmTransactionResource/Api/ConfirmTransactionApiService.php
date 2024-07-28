<?php
namespace App\Filament\Resources\ConfirmTransactionResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ConfirmTransactionResource;
use Illuminate\Routing\Router;


class ConfirmTransactionApiService extends ApiService
{
    protected static string | null $resource = ConfirmTransactionResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
