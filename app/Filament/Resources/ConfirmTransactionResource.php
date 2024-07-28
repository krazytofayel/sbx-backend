<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ConfirmTransaction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ConfirmTransactionResource\Pages;
use App\Filament\Resources\ConfirmTransactionResource\RelationManagers;

class ConfirmTransactionResource extends Resource
{
    protected static ?string $model = ConfirmTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('Confirm Transaction ID'),
                TextColumn::make('agent.full_name')->label('Agent Name'),
                TextColumn::make('transaction.user.name')->label('Sender Name'),
                TextColumn::make('transaction.user.sender_information.reference_id'),
                TextColumn::make('transaction.receiver.name')->label('Receiver Name'),
                TextColumn::make('transaction.amount_bd')->label('BD Amount'),
                TextColumn::make('transaction.amount_au')->label('AU Amount'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListConfirmTransactions::route('/'),
            // 'create' => Pages\CreateConfirmTransaction::route('/create'),
            // 'edit' => Pages\EditConfirmTransaction::route('/{record}/edit'),
        ];
    }
}
