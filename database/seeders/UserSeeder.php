<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Omar Faruk',
            'phone' => '01955213569',
            'phone_verified_at' => now(),
            'email' => 'info@gazisportsbd.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Omarfarukomi1!'),
            'role' => 'admin',
            'photo' => '',
            'disabled' => false,
        ]);
    }
}
