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
            'name' => 'Abu Toha',
            'phone' => '01911588858',
            'phone_verified_at' => now(),
            'email' => 'store@buyzin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'admin',
            'photo' => '',
            'disabled' => false,
        ]);
    }
}
