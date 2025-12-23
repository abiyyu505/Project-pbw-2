<?php

namespace App\Filament\Admin\Resources\Rooms\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        // 'Standard', 'Deluxe', 'Suite', 'Family Room', 'Executive'

        return $schema
            ->components([
                Select::make('room_type')
                    ->options([
                        'Standard' => 'Standard',
                        'Suite' => 'Suite',
                        'Deluxe' => 'Deluxe',
                        'Family Room' => 'Family Room',
                        'Executive' => 'Executive'
                    ])
                    ->required(),
                Select::make('hotel_id')
                    ->relationship('hotel', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Select::make('capacity')
                    ->options([
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4
                    ])
                    ->required(),
            ]);
    }
}
