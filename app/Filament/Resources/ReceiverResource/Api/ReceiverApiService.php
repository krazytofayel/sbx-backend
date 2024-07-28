<?php
namespace App\Filament\Resources\ReceiverResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ReceiverResource;
use Illuminate\Routing\Router;


class ReceiverApiService extends ApiService
{
    protected static string | null $resource = ReceiverResource::class;

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
