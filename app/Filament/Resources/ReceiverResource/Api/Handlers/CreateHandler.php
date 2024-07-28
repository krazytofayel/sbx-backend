<?php

namespace App\Filament\Resources\ReceiverResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Illuminate\Support\Facades\Validator;
use App\Filament\Resources\ReceiverResource;

class CreateHandler extends Handlers
{
    public static string | null $uri = '/';
    public static string | null $resource = ReceiverResource::class;


    public static bool $public = true;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel()
    {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {

        // Define validation rules user_id foreign key exit or not
        $rules = [
            'user_id' => 'required|exists:users,id',

        ];


        $messages = [
            'user_id.exists' => 'The selected user ID does not exist.',

        ];


        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Validation failed.',
            ], 422);
        }

        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}
