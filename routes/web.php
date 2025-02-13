<?php

use Illuminate\Support\Facades\Route;
Use App\Livewire\Login;
Use App\Livewire\Logout;
Use App\Livewire\Dashboard;
Use App\Livewire\User\Users;
Use App\Livewire\User\CreateUser;
Use App\Livewire\User\EditUser;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/login',Login::class)->name('admin.login');
Route::get('/admin/logout',Logout::class)->name('admin.logout');

Route::middleware('authentication')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/users',Users::class)->name('users');
    Route::get('/users/create', CreateUser::class)->name('users.create');
    Route::get('/users/edit/{userId?}', EditUser::class)->name('users.edit');
});