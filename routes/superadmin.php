<?php

use App\Livewire\Superadmin;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->middleware(['super_admin'])->group(function () {

    Route::get('/dashboard', Superadmin\Dashboard::class)->name('superadmin.dashboard');

    Route::prefix('list')->group(function () {
        Route::get('/project', Superadmin\ListProject::class)->name('superadmin.list-project');
        Route::get('/project/create', Superadmin\CreateProject::class)->name('superadmin.create-project');
        Route::get('/project/{id}', Superadmin\DetailProject::class)->name('superadmin.detail-project');
        Route::get('/project/{id}/edit', Superadmin\EditProject::class)->name('superadmin.edit-project');

        // Detail Project
        Route::get('/project/{id}/tasks', Superadmin\Project\TaskProject::class)->name('superadmin.project-task');
        Route::get('/project/{id}/task/add-task', Superadmin\Project\Task\CreateTask::class)->name('superadmin.project-add-task');

        Route::get('/project/{id}/pembayaran', Superadmin\Project\PembayaranProject::class)->name('superadmin.project-pembayaran');
        Route::get('/project/{id}/add-pembayaran', Superadmin\Project\Pembayaran\CreatePembayaran::class)->name('superadmin.project-add-pembayaran');

        Route::get('/project/{id}/list-invoice', Superadmin\Project\ListInvoice::class)->name('superadmin.project-invoice');
        Route::get('/project/{id}/list-dokumen', Superadmin\Project\ListDokumen::class)->name('superadmin.project-dokumen');
        Route::get('/project/{id}/list-langganan', Superadmin\Project\ListLangganan::class)->name('superadmin.project-langganan');

        Route::get('/task', Superadmin\ListTask::class)->name('superadmin.list-task');
        Route::get('/task/create', Superadmin\Task\CreateTask::class)->name('superadmin.create-task');
        Route::get('/task/{id}/edit', Superadmin\Task\EditTask::class)->name('superadmin.edit-task');

        Route::get('/customer', Superadmin\ListCustomer::class)->name('superadmin.list-customer');
        Route::get('/customer/create', Superadmin\Customer\CreateCustomer::class)->name('superadmin.create-customer');
        Route::get('/customer/{id}/edit', Superadmin\Customer\EditCustomer::class)->name('superadmin.edit-customer');

        Route::get('/vendor', Superadmin\ListVendor::class)->name('superadmin.list-vendor');

        Route::get('/staff', Superadmin\ListStaff::class)->name('superadmin.list-staff');
        Route::get('/staff/create', Superadmin\Staff\CreateStaff::class)->name('superadmin.create-staff');

        Route::get('/admin', Superadmin\ListAdmin::class)->name('superadmin.list-admin');

        Route::get('/pembayaran', Superadmin\ListPembayaran::class)->name('superadmin.list-pembayaran');

        Route::get('/invoice', Superadmin\ListInvoice::class)->name('superadmin.list-invoice');
    });
});
