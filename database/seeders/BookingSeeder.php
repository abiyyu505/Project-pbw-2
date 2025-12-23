<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $status = ['pending', 'completed', 'canceled'];

        
        
        for($i = 1; $i <= 5; $i++){
            $checkIn = Carbon::now()->addDays(rand(0, 7));
            $checkOut = (clone $checkIn)->addDays(rand(1, 5));


            $invoiceId = 'INV-' . now()->format('Ymd') . '-' . str_pad($i, 4, '0', STR_PAD_LEFT);


            Booking::create([
                'invoice_id' => $invoiceId,
                'user_id' => 1,
                'room_id' => fake()->numberBetween(1, 50),
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'total_price' => fake()->randomFloat(2, 100000, 1000000),
                'status' => fake()->randomElement($status),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
        }
    }
}
