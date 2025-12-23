<?php

namespace App\Filament\Admin\Resources\Bookings;

use App\Filament\Admin\Resources\Bookings\Pages\CreateBookings;
use App\Filament\Admin\Resources\Bookings\Pages\EditBookings;
use App\Filament\Admin\Resources\Bookings\Pages\ListBookings;
use App\Filament\Admin\Resources\Bookings\Schemas\BookingsForm;
use App\Filament\Admin\Resources\Bookings\Tables\BookingsTable;
use App\Models\Booking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\Room;

class BookingsResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'invoice_id';

    public static function form(Schema $schema): Schema
    {
        return BookingsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['room_type'], $data['hotel_id'])) {
            $data['room_id'] = Room::where('hotel_id', $data['hotel_id'])
                ->where('room_type', $data['room_type'])
                ->value('id');
        }

        unset($data['room_type']); // karena bukan kolom DB
        unset($data['hotel_id']);

        return $data;
    }


    public static function getPages(): array
    {
        return [
            'index' => ListBookings::route('/'),
            'create' => CreateBookings::route('/create'),
            'edit' => EditBookings::route('/{record}/edit'),
        ];
    }
}
