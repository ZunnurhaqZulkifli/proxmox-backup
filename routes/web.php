<?php

use App\Http\Controllers\BackupController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

Route::get('/',  function() {
    return redirect()->route('dashboard');
});

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth', 'prefix' => '/system'], function() {
    Route::resource('backups', BackupController::class);

    Route::get('start-backup', [BackupController::class, 'startBackup'])->name('backups.run-backup');
});

Route::group(['middleware' => 'auth', 'prefix' => '/user'], function() {
    Route::view('profile', 'profile')->middleware(['auth'])->name('profile');    
});

Route::get('health', HealthCheckResultsController::class);

require __DIR__.'/auth.php';
