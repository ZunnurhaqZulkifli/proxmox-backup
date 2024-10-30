<?php

namespace Database\Seeders;

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
        $users = [
            [
                'name' => 'System Administrator',
                'email' => 'admin@example.test',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'User 1',
                'email' => 'user@example.test',
                'password' => Hash::make('password')
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
