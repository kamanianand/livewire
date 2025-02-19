<?php

use Illuminate\Support\Facades\Route;
//Admin route
Use App\Livewire\Admin\Login;

//Frontend route
Use App\Livewire\Frontend\Users\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin',Login::class)->name('admin.login');

Route::get('/user',User::class)->name('user');


require __DIR__.'/admin.php';