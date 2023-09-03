<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(25)->create();
        User::create([
            'name' => 'Andi Suartika',
            'email' => 'andi@gmail.com',
            'role' => 'admin',
            'phone' => '085728614399',
            'bio' => 'Mobile Dev',
            'email_verified_at' => now(),
            'password' => Hash::make('123123'),
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'role' => 'superadmin',
            'phone' => '085728614399',
            'bio' => 'Fullstack Dev',
            'email_verified_at' => now(),
            'password' => Hash::make('123123'),
        ]);
    }
}
