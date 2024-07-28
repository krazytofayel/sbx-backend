<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Agent;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Transaction;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use App\Models\ConfirmTransaction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('Transaction ID'),
                TextColumn::make('user.name')->label('Sender Name'),
                TextColumn::make('user.email')->label('Sender email'),
                TextColumn::make('user.sender_information.reference_id')->label('Sender Reference ID'),
                TextColumn::make('receiver.name')->label('Receiver Name'),
                TextColumn::make('amount_bd'),
                TextColumn::make('amount_au'),
            ])
            ->filters([
                //
            ])



            ->actions([
                Action::make('confirm')
                    ->label('Confirm')
                    ->action(function (Transaction $record, array $data) {
                        if (ConfirmTransaction::where('transaction_id', $record->id)->exists()) {
                            Notification::make()
                                ->title('Transaction Already Confirmed')
                                ->body('This transaction has already been confirmed.')
                                ->danger()
                                ->send();
                        } else {
                            ConfirmTransaction::create([
                                'transaction_id' => $record->id,
                                'agent_id' => $data['agent_id'],
                            ]);

                            Notification::make()
                                ->title('Transaction Confirmed')
                                ->body('The transaction has been confirmed successfully.')
                                ->success()
                                ->send();
                        }
                    })
                    ->form([
                        Forms\Components\Select::make('agent_id')
                            ->label('Select Agent')
                            ->options(Agent::all()->pluck('full_name', 'id')->toArray())
                            ->required(),
                    ])
                    ->button()
                    ->icon('heroicon-o-check')
                    ->color(function (Transaction $record) {
                        return ConfirmTransaction::where('transaction_id', $record->id)->exists() ? 'danger' : 'success';
                    })
                    ->disabled(function (Transaction $record) {
                        return ConfirmTransaction::where('transaction_id', $record->id)->exists();
                    }),
            ]);


            // ->actions([
            //     Action::make('selectAgent')
            //         ->label('Confirm')
            //         ->action(function (Transaction $record, array $data) {

            //             ConfirmTransaction::create([

            //                 'transaction_id' => $record->id,
            //                 'agent_id' => $data['agent_id'],
            //             ]);

            //             Notification::make()
            //                 ->title('Transaction Confirmed')
            //                 ->body('The transaction has been confirmed successfully.')
            //                 ->success()
            //                 ->send();
            //         })
            //         ->form([
            //             Forms\Components\Select::make('agent_id')
            //                 ->label('Select Agent')
            //                 ->options(Agent::all()->pluck('name', 'id')->toArray())
            //                 ->required(),
            //         ])
            //         ->button()
            //         ->icon('heroicon-o-check')
            //         ->color('success'),





            // ]);


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
            'index' => Pages\ListTransactions::route('/'),
            // 'create' => Pages\CreateTransaction::route('/create'),
            // 'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
