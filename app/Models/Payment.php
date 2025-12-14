<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'order_id',
        'amount',
        'status',
        'snap_token'
    ];

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
