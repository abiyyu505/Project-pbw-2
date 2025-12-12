<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $status = ['pending', 'complited', 'canceled'];

        $data = [];
        for($i = 1; $i <= 5; $i++){
            $data[] = [
                'user_id' => 1,
                'room_id' => fake()->numberBetween(1, 50),
                'check_in' => fake()->date('Y-m-d', 'now'),
                'check_out' => fake()->date('Y-m-d', 'now'),
                'price' => fake()->randomFloat(2, 100000, 1000000),
                'status' => fake()->randomElement($status),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Booking::insert($data);
    }
}
