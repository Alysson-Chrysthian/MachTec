<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/company')
    ->name('company.')
    ->group(function () {

        Route::get('/auth/register', App\Livewire\Company\Auth\Register::class)
            ->name('auth.register');

    });