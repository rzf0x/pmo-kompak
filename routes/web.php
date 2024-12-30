<?php

use App\Livewire\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/auth/login', LoginController::class)->name('login');


require __DIR__ . '/superadmin.php';

require __DIR__ . '/admin.php';

require __DIR__ . '/staff.php';
