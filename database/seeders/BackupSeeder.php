<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $backups = [
            [
                'name' => 'Initial Backup',
                'path' => '/path/to/backup',
                'status' => 'pending',
                'started_at' => now(),
                'completed_at' => now(),
                'created_at' => now(),
            ],

            [
                'name' => 'Initial Backup 2',
                'path' => '/path/to/backup',
                'status' => 'pending',
                'started_at' => now(),
                'completed_at' => now(),
                'created_at' => now(),
            ],

            [
                'name' => 'Initial Backup 3',
                'path' => '/path/to/backup',
                'status' => 'pending',
                'started_at' => now(),
                'completed_at' => now(),
                'created_at' => now(),
            ],
        ];

        foreach ($backups as $backup) {
            \App\Models\Backup::create($backup);
        }
    }
}
