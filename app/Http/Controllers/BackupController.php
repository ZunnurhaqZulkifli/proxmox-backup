<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBackupRequest;
use App\Http\Requests\UpdateBackupRequest;
use App\Models\Backup;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PHPUnit\TextUI\Command\Command;

class BackupController extends Controller
{
    public function index()
    {
        return view('backups.index', [
            'backups' => Backup::all(),
        ]);
    }
    
    protected function rCommand($command)
    {
        $process = proc_open($command, [
            1 => ['pipe', 'w'], // stdout
            2 => ['pipe', 'w'], // stderr
        ], $pipes);

        if (is_resource($process)) {
            while ($line = fgets($pipes[1])) {
                Log::info($line);
                // Mail::to('zunnurhaq123@gmail.com')->send(new \App\Mail\SendNotification($line));
            }

            while ($line = fgets($pipes[2])) {
                Log::error($line);
                Mail::to('zunnurhaq123@gmail.com')->send(new \App\Mail\SendNotification($line));
            }

            fclose($pipes[1]);
            fclose($pipes[2]);

            return proc_close($process);
        }

        return 1;
    }

    public function startBackup()
    {
        // Artisan::call('app:init');

        $this->rCommand('cd ~/development/laravel/not_work/pmx-backup');
        $this->rCommand('python3 backup.py');

        

        return redirect()->route('backups.index');
    }
}
