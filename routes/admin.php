<?php

use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['admin'])->group(function () {

    Route::get('/dashboard', Admin\Dashboard::class)->name('admin.dashboard');
});
