<?php

namespace App\Filament\Admin\Resources\Hotels\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HotelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('description')
                    ->default(null),
                TextInput::make('address')
                    ->default(null),
                Select::make('location_id')
                    ->relationship('location', 'city')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }
}
