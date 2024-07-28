<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\SenderInformation;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SenderInformationResource\Pages;
use App\Filament\Resources\SenderInformationResource\RelationManagers;

class SenderInformationResource extends Resource
{
    protected static ?string $model = SenderInformation::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             TextInput::make('name')->required(),
    //             TextInput::make('phone')->email(),
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Sender ID'),
                TextColumn::make('name'),
                TextColumn::make('user.name')->label('Full Name'),
                TextColumn::make('user.email'),
                TextColumn::make('reference_id'),
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
            'index' => Pages\ListSenderInformation::route('/'),
            // 'create' => Pages\CreateSenderInformation::route('/create'),
            // 'edit' => Pages\EditSenderInformation::route('/{record}/edit'),
        ];
    }
}
