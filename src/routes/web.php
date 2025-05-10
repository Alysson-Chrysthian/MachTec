<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/company')
    ->name('company.')
    ->group(function () {

        Route::get('/auth/register', App\Livewire\Company\Auth\Register::class)
            ->name('auth.register');
        Route::get('/auth/login', App\Livewire\Company\Auth\Login::class)
            ->name('auth.login');

    });

Route::prefix('/employee')
    ->name('employee.')
    ->group(function () {

        Route::get('/auth/login', App\Livewire\Employee\Auth\Login::class)
            ->name('auth.login');

    });