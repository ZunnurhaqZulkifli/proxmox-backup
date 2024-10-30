<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/',  function() {
    Mail::to('zunnurhaq123@gmail.com')->send(new App\Mail\SendNotification(
        'Accessed Desktop'
    ));

    return view('welcome');
});

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');
Route::get('counter', Counter::class);

Route::get('/send-email', function() {
    $message = 'This is a notification message.';

    Mail::to('zunnurhaq123@gmail.com')->send(new App\Mail\SendNotification($message));

    return 'Email was sent';
});

require __DIR__.'/auth.php';
