<?php

use App\Http\Controllers\AgendaController;
use App\Models\Agenda;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/citaMedica', 'inicio')->name('citaMedica');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


    Route::resource('agendas', AgendaController::class);
require __DIR__.'/auth.php';
