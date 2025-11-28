<?php

use App\Http\Controllers\ContactoController;
use App\Livewire\AgregarMain;
use App\Livewire\CategoryMain;
use App\Livewire\ClientMain;
use App\Livewire\NoticiasMain;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
Route::post('/contacto/enviar', [ContactoController::class, 'store'])->name('contacto.enviar');

Route::get('/', function () {
    return view('welcome');

})->name('home');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Route::get('categories',CategoryMain::class)->name('categories');
    Route::get('events',ClientMain::class)->name('events');
    Route::get('noticias',NoticiasMain::class)->name('noticias');
    Route::get('agregar',AgregarMain::class)->name('agregar');
});

require __DIR__.'/auth.php';
