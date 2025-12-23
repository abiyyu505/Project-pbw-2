<?php

namespace App\Filament\Admin\Resources\Bookings\Pages;

use App\Filament\Admin\Resources\Bookings\BookingsResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Room;

class CreateBookings extends CreateRecord
{
    protected static string $resource = BookingsResource::class;

}
