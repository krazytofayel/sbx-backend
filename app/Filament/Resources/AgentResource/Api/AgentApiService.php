<?php
namespace App\Filament\Resources\AgentResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\AgentResource;
use Illuminate\Routing\Router;


class AgentApiService extends ApiService
{
    protected static string | null $resource = AgentResource::class;

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
