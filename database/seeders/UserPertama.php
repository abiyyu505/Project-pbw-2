<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserPertama extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('admin123'), 
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin1@example.com',
            'password' => bcrypt('admin123'),
            'is_admin' => 1
        ]);
    }
}
