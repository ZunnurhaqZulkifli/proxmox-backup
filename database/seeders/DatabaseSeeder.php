<?php

namespace Database\Seeders;

use App\Models\AssignmentDetail;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\Event\Telemetry\System;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->command->call('db:wipe');
        $this->command->call('migrate:fresh');

        $this->call([
            UsersSeeder::class,
            // AttachRoleToUserSeeder::class,
        ]);
    }
}
