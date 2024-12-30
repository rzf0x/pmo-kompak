<?php

use App\Livewire\Staff;
use Illuminate\Support\Facades\Route;

Route::prefix('staff')->middleware(['staff'])->group(function () {

    Route::get('/dashboard', Staff\Dashboard::class)->name('staff.dashboard');

    Route::get('/list-task', Staff\ListTask::class)->name('staff.list-task');
    Route::get('/list-tasl/{id}/edit', Staff\ListTask\EditTask::class)->name('staff.edit-task');


    Route::get('/profile', Staff\Profile::class)->name('staff.profile');
});
