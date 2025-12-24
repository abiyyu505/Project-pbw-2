<?php

namespace App\Filament\Admin\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_id')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('room.room_type')
                    ->searchable(),
                TextColumn::make('room.hotel.name')
                    ->searchable(),
                TextColumn::make('check_in')
                    ->searchable(),
                TextColumn::make('check_out')
                    ->searchable(),
                TextColumn::make('total_price')
                    ->prefix('Rp ')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'completed',
                        'danger' => 'canceled',
                        'info' => 'paid'
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',
                        'heroicon-o-check-circle' => 'completed',
                        'heroicon-o-credit-card' => 'paid',
                        'heroicon-o-x-circle' => 'canceled',
                    ])
                    ,
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
