<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Agent;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AgentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AgentResource\RelationManagers;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TextInput::make('user_id')->required(),
                TextInput::make('full_name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('phone')->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                TextInput::make('alt_phone')->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                TextInput::make('thumbnail')->nullable(),
                TextInput::make('dob')->required() ->mask('99/99/9999')->placeholder('MM/DD/YYYY'),
                TextInput::make('nid') ->required()->numeric()->inputMode('decimal'),
                TextInput::make('city')->required(),
                TextInput::make('state')->required(),
                TextInput::make('country')->required(),
                TextInput::make('post_code')->required()->minValue(1)->maxValue(5),
                TextInput::make('back_ac_name')->required(),
                TextInput::make('back_ac_no')->required()  ->mask(RawJs::make(<<<'JS'
                $input.startsWith('34') || $input.startsWith('37') ? '9999 999999 99999' : '9999 9999 9999 9999'
            JS)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name'),
                //TextColumn::make('user_id'),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('country'),
                TextColumn::make('back_ac_name'),
                TextColumn::make('back_ac_no'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgents::route('/'),
            'create' => Pages\CreateAgent::route('/create'),
            'edit' => Pages\EditAgent::route('/{record}/edit'),
        ];
    }
}
