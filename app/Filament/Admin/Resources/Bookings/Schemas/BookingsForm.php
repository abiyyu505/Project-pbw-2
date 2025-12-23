<?php

namespace App\Filament\Admin\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Room;
use Filament\Forms\Components\Hidden;

class BookingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('hotel_id')
                    ->afterStateHydrated(function ($set, $record) {
                        $set('hotel_id', $record?->room?->hotel_id);
                    }),
                Hidden::make('room_id'),

                // CREATE → pilih hotel
                Select::make('room_Id')
                    ->label('Hotel Name')
                    ->relationship('room.hotel', 'name')
                    ->preload()
                    ->searchable()
                    ->visible(fn ($record) => $record === null)
                    ->reactive()
                    ->required(),

                // EDIT → tampil hotel (read-only)
                TextInput::make('room.hotel.name')
                    ->label('Hotel')
                    ->disabled()
                    ->dehydrated(false)
                    ->visible(fn ($record) => $record !== null)
                    ->formatStateUsing(fn ($record) => $record?->room?->hotel?->name),
                    
                TextInput::make('invoice_id')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('room_type')
                    ->label('Room Type')
                    ->options(function (callable $get) {
                        $hotelId = $get('hotel_id'); // hotel_id sudah di-set di hidden
                        if (!$hotelId) return [];
                        return Room::where('hotel_id', $hotelId)
                            ->pluck('room_type', 'room_type');
                    })
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $roomId = Room::where('hotel_id', $get('hotel_id'))
                            ->where('room_type', $state)
                            ->value('id');
                        $set('room_id', $roomId);
                    }),
                DatePicker::make('check_in')
                    ->native(false)
                    ->required(),
                DatePicker::make('check_out')
                    ->native(false)
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'completed' => 'Completed',
                        'canceled' => 'Canceled'
                    ])
                    ->required(),
            ]);
    }
}
