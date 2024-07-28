<?php
namespace App\Filament\Resources\SenderInformationResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\SenderInformationResource;
use Illuminate\Routing\Router;


class SenderInformationApiService extends ApiService
{
    protected static string | null $resource = SenderInformationResource::class;

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
