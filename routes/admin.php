<?php

use Illuminate\Support\Facades\Route;
Use App\Livewire\Admin\Logout;
Use App\Livewire\Admin\Dashboard;
Use App\Livewire\Admin\User\Users;
Use App\Livewire\Admin\User\CreateUser;
Use App\Livewire\Admin\User\EditUser;

Route::get('/admin/logout',Logout::class)->name('admin.logout');

Route::middleware('authentication')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/users',Users::class)->name('users');
    Route::get('/users/create', CreateUser::class)->name('users.create');
    Route::get('/users/edit/{userId?}', EditUser::class)->name('users.edit');
});
