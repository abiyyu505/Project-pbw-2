<?php

namespace App\Filament\Admin\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_id')
                    ->label('Order ID')
                    ->required(),
                TextInput::make('amount')
                    ->label('Amount')
                    ->required()
                    ->prefix('Rp')
                    ->numeric(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'canceled' => 'Canceled'
                    ])
                    ->required(),
            ]);
    }
}
