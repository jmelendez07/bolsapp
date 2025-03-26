<?php

use App\Livewire\DashboardPage;
use App\Livewire\JobPage;
use App\Livewire\LandingPage;
use App\Livewire\ProfilePage;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPage::class);
Route::get('/trabajos', JobPage::class)->name('jobs.index');

Route::get('panel', DashboardPage::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('perfil', ProfilePage::class)
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
